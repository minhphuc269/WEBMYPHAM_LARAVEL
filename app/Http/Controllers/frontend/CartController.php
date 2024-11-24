<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\OrderSuccess;
use App\Models\City;
use App\Models\Coupon;
use App\Models\Delivery;
use App\Models\District;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class CartController extends Controller
{
    public function index()
    {
        $list_cart = session('carts', []);
        return view("frontend.cart", compact('list_cart'));
    }
    public function addcart()
    {
        $productid=$_GET["productid"];
        $qty=$_GET["qty"];
        $product=Product::find($productid);
        $cartitem = array(
            'id'=>$productid,
            'image'=>$product->image,
            'name'=>$product->name,
            'price'=>($product->pricesale>0)?$product->pricesale:$product->price,
            'qty'=>$qty
        );
        // luu vao session dang mang 2 chieu
        $carts = session('carts',[]);
        if(is_array($carts) && count($carts)==0)
        {
            array_push($carts,$cartitem);
            session(['carts'=> $carts]);
        }
        else
        {
            $check = true;
            foreach($carts as $key=>$item)
            {
                if(in_array($productid,$item))
                {
                    $carts[$key]['qty']+=$qty;
                    $check = false;
                    break;
                }
            }
            if($check==true)
            {
                array_push($carts,$cartitem);
            }
            session(['carts' => $carts]);
        }
        echo count($carts);
    }
    public function update(Request $request)
    {
        $carts = session('carts', []);
        $list_qty = $request->qty;
        foreach ($carts as $key => $cart) {
            foreach ($list_qty as $productid => $qtyvalue) {
                if ($carts[$key]['id'] == $productid) {
                    $carts[$key]['qty'] = $qtyvalue;
                }
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }
    public function delete($id)
    {
        $carts = session('carts', []);
        foreach ($carts as $key => $cart) {
            if ($carts[$key]['id'] == $id) {
                unset($carts[$key]);
            }
        }
        session(['carts' => $carts]);
        return redirect()->route('site.cart.index');
    }
    public function getShippingFee(Request $request)
    {
        $id_city = $request->input('id_city');

        // Lấy phí vận chuyển từ bảng Delivery
        $shippingFee = Delivery::where('id_city', $id_city)->where('status', 1)->value('feeship');

        if ($shippingFee !== null) {
            return response()->json(['fee' => $shippingFee]);
        } else {
            return response()->json(['fee' => null]);
        }
    }

    public function checkout()
    {
        $list_cart = session('carts', []);
        $cities = City::all();
        $districts = District::all();
        $towns = Town::all();

        // Đặt phí vận chuyển mặc định
        $shippingFee = 40000;

        return view("frontend.checkout", compact('list_cart', 'cities', 'districts', 'towns', 'shippingFee'));
    }


    public function applyCoupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        $couponCode = $request->input('coupon_code');

        // Kiểm tra mã giảm giá
        $coupon = Coupon::where('code', $couponCode)->first();

        if (!$coupon) {
            return response()->json(['valid' => false, 'message' => 'Mã giảm không hợp lệ.'], 404);
        }

        // Tính toán tổng tiền từ giỏ hàng
        $carts = session('carts', []);
        $totalMoney = 0;

        foreach ($carts as $cart) {
            $totalMoney += $cart['price'] * $cart['qty'];
        }

        $shippingFee = 40000;

        // Tính toán giảm giá
        if ($coupon->condition_coupon == 1) {
            // Giảm theo phần trăm
            $discount = ($totalMoney * $coupon->pricesale) / 100;
        } else {
            // Giảm theo tiền
            $discount = $coupon->pricesale;
        }

        $total = $totalMoney + $shippingFee - $discount;

        return response()->json([
            'valid' => true,
            'discount' => $discount,
            'total' => $total,
            // Không trả về message nếu coupon hợp lệ
        ]);
    }
    public function saveDiscount(Request $request)
    {
        $request->validate([
            'discount' => 'required|numeric',
        ]);

        $discount = $request->input('discount');
        session(['discount_amount' => $discount]);

        return response()->json(['success' => true]);
    }
    public function docheckout(Request $request)
    {
        $user = Auth::user();
        $carts = session('carts', []);
        
        if (count($carts) > 0) {
            $order = new Order();
            $order->user_id = $user->id;
            $order->order_code = 'ORD' . strtoupper(Str::random(8));
            $order->delivery_name = $request->name;
            $order->delivery_gender = $user->gender;
            $order->delivery_email = $request->email;
            $order->delivery_phone = $request->phone;
    
            $cityId = $request->id_city;
            $districtId = $request->id_district;
            $townId = $request->id_town;
    
            $city = City::where('matp', $cityId)->first(); 
            $district = District::where('maqh', $districtId)->first(); 
            $town = Town::where('xaid', $townId)->first(); 
    
            $cityName = $city ? $city->name : 'Chưa chọn tỉnh/thành phố';
            $districtName = $district ? $district->name : 'Chưa chọn quận/huyện';
            $townName = $town ? $town->name : 'Chưa chọn xã/phường';
            $address = $request->address ? $request->address : 'Chưa nhập địa chỉ';
    
            $order->delivery_address = "$cityName / $districtName / $townName / $address";
            $order->note = $request->note;
            $order->created_at = now();
            $order->type = 'thanh toán khi nhận hàng';
            $order->status = 1;
            $order->status_order = 'Chờ xác nhận';
    
            // Phí vận chuyển và giảm giá
            $shippingFee = Delivery::where('id_city', $request->id_city)->where('status', 1)->value('feeship') ?? 40000;
            $discount = session('discount_amount', 0); 
    
            if ($order->save()) {
                foreach ($carts as $cart) {
                    $orderdetail = new Orderdetail();
                    $orderdetail->order_code = $order->order_code;
                    $orderdetail->product_id = $cart['id'];
                    $orderdetail->price = $cart['price'];
                    $orderdetail->qty = $cart['qty'];
                    $orderdetail->discount = $discount; 
                    $orderdetail->feeship = $shippingFee;
    
                    // Tính toán tổng số tiền (có tính đến giảm giá nếu cần)
                    $amount = ($cart['price'] * $cart['qty']) - $discount; // Áp dụng giảm giá
                    $orderdetail->amount = max(0, $amount); // Đảm bảo số tiền không âm
                    $orderdetail->save();
                }
    
            //    Mail::to($request->email)->send(new OrderSuccess($order));
                // Xóa session giỏ hàng
                session(['carts' => []]);
            }
        }
    
        return view("frontend.checkout_message");
    }
    
}

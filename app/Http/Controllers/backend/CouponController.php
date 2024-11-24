<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use Coupon as GlobalCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CouponController extends Controller
{

    public function index()
    {
        $list = Coupon::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'code', 'qty', 'condition_coupon', 'pricesale', 'status')
            ->get();

        return view('backend.coupon.index', compact("list"));
    }

    public function trash()
    {
        $list = Coupon::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'code', 'qty', 'condition_coupon', 'pricesale','image')
            ->get();
        return view('backend.coupon.trash', compact("list"));
    }

    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->name = $request->input('name');
        $coupon->code = $request->input('code');
        $coupon->description = $request->input('description');
        $coupon->qty = $request->input('qty');
        $coupon->condition_coupon = $request->input('condition_coupon');
        $coupon->pricesale = $request->input('pricesale');

        //
        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($coupon->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/coupons/'), $fileName);
                $coupon->image = $fileName;
            }
        }
        $coupon->status = 2;
        $coupon->created_by = Auth::id() ?? 1;
        $coupon->save();

        return redirect()->route('admin.coupon.index')->with('success', 'Thêm mã giảm giá thành công.');
    }



    public function show(string $id)
    {
        $coupon = Coupon::with(['creator', 'updater'])
            ->findOrFail($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        return view('backend.coupon.show', compact("coupon"));
    }

    public function edit(string $id)
    {
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        $list = Coupon::where('status', '!=', '0')
            ->where('id', '!=', $id) // Loại trừ mã giảm giá hiện tại
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'code', 'qty', 'condition_coupon', 'pricesale', 'status')
            ->get();

        return view('backend.coupon.edit', compact("list", 'coupon'));
    }

    public function update(Request $request, string $id)
    {
        //cap nhat
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        //
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->description = $request->description;
        $coupon->qty = $request->qty;
        $coupon->condition_coupon = $request->condition_coupon;
        $coupon->pricesale = $request->pricesale;
        //
        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($coupon->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/coupons/'), $fileName);
                $coupon->image = $fileName;
            }
        }

        $coupon->status = $request->status;
        $coupon->updated_at = now();
        $coupon->updated_by = Auth::id() ?? 1; //dang nhap

        $coupon->save();

        return redirect()->route('admin.coupon.index')->with('success', 'Cập nhật mã giảm giá thành công.');
    }


    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        $coupon->delete(); //xoa khoi csdl
        return redirect()->route('admin.coupon.trash')->with('success', 'Đã xóa mã giảm giá vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $coupon->status = $coupon->status == 1 ? 2 : 1;
        $coupon->updated_at = now();
        $coupon->updated_by = Auth::id() ?? 1; //dang nhap
        $coupon->save();

        return response()->json(['status' => $coupon->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        $coupon->status = 0;
        $coupon->updated_at = now();
        $coupon->updated_by = Auth::id() ?? 1; //dang nhap
        $coupon->save();

        return redirect()->route('admin.coupon.index')->with('success', 'Đã xóa mã giảm giá vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $coupon = Coupon::find($id);
        if ($coupon == null) {
            return redirect()->route('admin.coupon.index');
        }
        $coupon->status = 2;
        $coupon->updated_at = now();
        $coupon->updated_by = Auth::id() ?? 1; //dang nhap
        $coupon->save();

        return redirect()->route('admin.coupon.trash')->with('success', 'Đã khôi phục mã giảm giá.');
    }
}

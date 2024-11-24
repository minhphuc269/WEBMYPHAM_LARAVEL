<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Order::where("order.status", "!=", 0)

            ->orderBy("order.created_at", "DESC") // mới nhất lên đầu
            ->select("order.id", "delivery_name", "delivery_email", "delivery_phone", "status","created_at","type","order_code","status_order")
            ->get();

        return view('backend.order.index', compact("list"));
    }

    //Thùng rác
    public function trash()
    {
        $list = Order::where("order.status", "=", 0)

            ->orderBy("order.created_at", "DESC") // mới nhất lên đầu
            ->select("order.id", "order.delivery_name", "order.delivery_email", "order.delivery_phone")
            ->get();

        return view('backend.order.trash', compact("list"));
    }


    public function show($id)
{
    $order = Order::with('user')->findOrFail($id); 

    // Lấy OrderDetail và kết hợp thông tin sản phẩm
    $orderDetails = OrderDetail::with('product')->where('order_code', $order->order_code)->get();

    $totalAmount = $orderDetails->sum(function ($orderDetail) {
        return $orderDetail->qty * $orderDetail->price; 
    });

    return view('backend.order.show', compact('order', 'orderDetails', 'totalAmount'));
}

    

    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->delete(); //xoa khoi csdl
        return redirect()->route('admin.order.trash')->with('success', 'Đã xóa đơn hàng vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $order->status = $order->status == 1 ? 2 : 1;
        $order->updated_at = now();
        $order->updated_by = Auth::id() ?? 1; //dang nhap
        $order->save();

        return response()->json(['status' => $order->status], 200);
    }

    //Xóa vào thùng rác
    public function delete($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 0;
        $order->updated_at = now();
        $order->updated_by = Auth::id() ?? 1; //dang nhap
        $order->save();

        return redirect()->route('admin.order.index')->with('success', 'Đã xóa đơn hàng vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $order = Order::find($id);
        if ($order == null) {
            return redirect()->route('admin.order.index');
        }
        $order->status = 2;
        $order->updated_at = now();
        $order->updated_by = Auth::id() ?? 1; //dang nhap
        $order->save();

        return redirect()->route('admin.order.trash')->with('success', 'Đã khôi phục đơn hàng.');
    }
    public function printOrder($id)
    {
        // Lấy thông tin đơn hàng từ database
        $order = Order::with('user', 'orderDetails.product')->find($id);
    
        // Kiểm tra xem đơn hàng có tồn tại không
        if (!$order) {
            return redirect()->back()->with('error', 'Đơn hàng không tồn tại!');
        }
    
        // Tạo view cho PDF
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('backend.order.print', [
            'order' => $order,
            'orderDetails' => $order->orderDetails,
        ]);
    
        // Trả về file PDF
        return $pdf->download('don_hang_' . $order->order_code . '.pdf');
    }
    public function updateStatus(Request $request, $id)
{
    // Tìm đơn hàng theo ID
    $order = Order::findOrFail($id);

    // Cập nhật trạng thái đơn hàng với 'status_order'
    $order->status_order = $request->input('status_order');
    $order->save();

    // Chuyển hướng về trang chi tiết đơn hàng với thông báo thành công
    return redirect()->route('admin.order.show', $order->id)->with('success', 'Cập nhật trạng thái đơn hàng thành công!');
}
public function cancel($id)
{
    // Tìm đơn hàng theo ID
    $order = Order::find($id);

    // Kiểm tra nếu đơn hàng tồn tại
    if (!$order) {
        return redirect()->back()->with('error', 'Đơn hàng không tồn tại.');
    }

    // Xóa đơn hàng hoặc thay đổi trạng thái hủy (tuỳ theo yêu cầu của bạn)
    $order->status_order = 'Đã hủy'; // Ví dụ, đổi trạng thái thành 'canceled'
    $order->save();

    return redirect()->back()->with('success', 'Đơn hàng đã được hủy thành công.');
} 
}

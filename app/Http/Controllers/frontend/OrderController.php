<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        // Giả sử bạn đang sử dụng authentication và chỉ muốn hiển thị đơn hàng của người dùng đang đăng nhập
        $orders = Order::with('user')
        ->where('user_id', auth()->id())
        ->where('status', 1)
        ->orderBy('created_at', 'desc') // Sắp xếp từ mới tới cũ
        ->get();    
        return view('frontend.orders.index', compact('orders'));
    }
    public function show($id)
{
    // Lấy đơn hàng cùng thông tin người dùng và chi tiết đơn hàng
    $order = Order::with(['user', 'orderDetails.product'])->findOrFail($id);

    // Tính tổng tiền (nếu cần)
    $grandTotal = $order->orderDetails->sum(function($detail) {
        return ($detail->price * $detail->qty) - $detail->discount; // Trừ đi discount nếu có
    }) + $order->orderDetails->sum('feeship'); // Cộng phí vận chuyển từ orderDetails

    // Trả về view với thông tin đơn hàng
    return view('frontend.orders.show', compact('order', 'grandTotal'));
}
    
public function cancel($id)
{
    // Tìm đơn hàng theo ID
    $order = Order::findOrFail($id);

    // Kiểm tra trạng thái đơn hàng, nếu nó đang chờ thì hủy
    if ($order->status_order === 'Chờ xác nhận') {
        $order->status_order = 'Đã hủy'; // Hoặc giá trị nào đó để chỉ định đơn hàng đã bị hủy
        $order->save();
        return redirect()->route('orders.index')->with('success', 'Đơn hàng đã được hủy thành công.');
    }

    return redirect()->route('orders.index')->with('error', 'Không thể hủy đơn hàng này.');
}
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order; // Thêm model Order
use App\Models\User;  // Thêm model User
use App\Models\Orderdetail; // Thêm model Orderdetail
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy dữ liệu cần thiết cho dashboard
        $totalOrders = Order::count(); // Tổng số đơn hàng
        $newUsers = User::where('created_at', '>=', now()->subMonth())->count(); // Người dùng mới trong tháng qua
        $totalRevenue = Orderdetail::sum('amount'); // Doanh thu tổng từ bảng orderdetail
        $pendingOrders = Order::where('status', 'pending')->count(); // Đơn hàng đang xử lý
        $recentOrders = Order::orderBy('created_at', 'desc')->take(5)->get(); // Đơn hàng gần đây

        // Dữ liệu cho biểu đồ
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        $revenueData = []; // Dữ liệu doanh thu theo tháng
        for ($i = 0; $i < 12; $i++) {
            // Tính tổng doanh thu cho từng tháng
            $revenueData[] = Orderdetail::whereHas('order', function($query) use ($i) {
                $query->whereMonth('created_at', $i + 1);
            })->sum('amount');
        }

        return view('backend.dashboard.index', compact(
            'totalOrders',
            'newUsers',
            'totalRevenue',
            'pendingOrders',
            'recentOrders',
            'months',
            'revenueData'
        ));
    }
}

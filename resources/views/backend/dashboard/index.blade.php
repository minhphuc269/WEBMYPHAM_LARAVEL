@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <div class="row g-4">
        <!-- Card Thông tin tổng quan -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-primary shadow h-100 py-3 hover-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tổng đơn hàng</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalOrders }}</div>
                    </div>
                    <div>
                        <i class="fas fa-shopping-cart fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Người dùng mới -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-success shadow h-100 py-3 hover-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Người dùng mới</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $newUsers }}</div>
                    </div>
                    <div>
                        <i class="fas fa-user-plus fa-2x text-success"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Doanh thu -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-info shadow h-100 py-3 hover-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Doanh thu</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ number_format($totalRevenue) }} VNĐ</div>
                    </div>
                    <div>
                        <i class="fas fa-dollar-sign fa-2x text-info"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card Đơn hàng đang xử lý -->
        <div class="col-xl-3 col-md-6">
            <div class="card border-left-warning shadow h-100 py-3 hover-card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div class="mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Đơn hàng đang xử lý</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingOrders }}</div>
                    </div>
                    <div>
                        <i class="fas fa-hourglass-half fa-2x text-warning"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Biểu đồ doanh thu theo tháng -->
    <div class="row mt-4">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Doanh thu theo tháng</h6>
                </div>
                <div class="card-body">
                    <canvas id="revenueChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Đơn hàng gần đây -->
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Đơn hàng gần đây</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mã đơn</th>
                                    <th>Ngày</th>
                                    <th>Tổng</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentOrders as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->created_at->format('d/m/Y') }}</td>
                                    <td>{{ number_format($order->orderDetails->sum('amount')) }} VNĐ</td>
                                    <td>{{ $order->status_order }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu',
                data: [10000, 15000, 13000, 18000, 22000, 19000, 25000, 27000, 21000, 23000, 29000, 32000],
                backgroundColor: 'rgba(78, 115, 223, 0.2)',
                borderColor: 'rgba(78, 115, 223, 1)',
                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                borderWidth: 2,
                fill: true,
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Doanh thu (VNĐ)',
                    },
                },
                x: {
                    title: {
                        display: true,
                        text: 'Tháng',
                    },
                }
            },
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                },
                tooltip: {
                    enabled: true,
                    backgroundColor: 'rgba(0,0,0,0.7)',
                    bodyColor: 'white',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 1
                }
            }
        }
    });
</script>

@section('header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .hover-card:hover {
        transform: scale(1.05);
        transition: all 0.3s ease-in-out;
    }
    .card-body {
        background-color: #f8f9fc;
        border-radius: 10px;
    }
    .table thead th {
        text-transform: uppercase;
        font-size: 0.85rem;
    }
    .table-hover tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.05);
    }
</style>
@endsection
@endsection

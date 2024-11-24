@extends('layouts.site')

@section('title', 'Danh sách đơn hàng')

@section('content')
<div class="container">
    <div class="subheader ">
        <div class="container ">
            <x-menu-list-cate />
            <x-main-menu />
        </div>
    </div>
    <section class="bread-crumb mb-3">
        <span class="crumb-border"></span>
        <div class="container ">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb m-0 px-0">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="link"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>


                        <li><strong><span>Đơn hàng</span></strong></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container">
            @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif
    
            @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            <h1 class="mb-4">Danh sách đơn hàng</h1>
    
            @if($orders->isEmpty())
            <div class="alert alert-warning">Hiện tại bạn chưa có đơn hàng nào.</div>
            @else
            @foreach($orders as $order)
            <div class="order-card mb-4 p-3 border rounded">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h4 class="order-title">Đơn hàng: {{ $order->order_code }}</h4>
                    <span class="badge {{ $order->status_order === 'Đã hủy' ? 'badge-danger' : 'badge-success' }}">
                        {{ ucfirst($order->status_order) }}
                    </span>
                </div>
                <p class="mb-1"><strong>Ngày đặt:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                <p class="mb-1"><strong>Tổng tiền:</strong> {{ number_format($order->orderDetails->sum('amount'), 0, ',',
                    '.') }} đ</p>
    
                <div class="product-list">
                    @foreach($order->orderDetails as $detail)
                    <div class="product-item d-flex align-items-center mb-3">
                        <img src="{{ asset('images/products/'.$detail->product->image) }}"
                            alt="{{ $detail->product->name }}" class="product-image">
                        <div class="product-info ms-3">
                            <h5 class="product-name">{{ $detail->product->name }}</h5>
                            <p class="mb-0"><strong>Giá:</strong> {{ number_format($detail->price, 0, ',', '.') }} đ</p>
                            <p class="mb-0"><strong>Số lượng:</strong> {{ $detail->qty }}</p>
                            <p class="mb-0"><strong>Tổng tiền:</strong> {{ number_format($detail->price * $detail->qty, 0,
                                ',', '.') }} đ</p>
                        </div>
                    </div>
                    @endforeach
                </div>
    
                <div class="text-end mt-3">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm me-2">Xem chi tiết</a>
                    @if($order->status_order === 'Chờ xác nhận')
                    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này không?');">Hủy đơn hàng</button>
                    </form>
                    @else
                    <span class="text-muted">Không thể hủy</span>
                    @endif
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </section>
</div>

@endsection

<style>
    .order-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        transition: all 0.3s ease;
    }

    .order-card:hover {
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .order-title {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .product-list {
        margin-top: 15px;
    }

    .product-item {
        background-color: #fff;
        padding: 10px;
        border: 1px solid #eaeaea;
        border-radius: 5px;
    }

    .product-image {
        max-width: 80px;
        max-height: 80px;
        border-radius: 5px;
    }

    .product-info {
        flex-grow: 1;
    }

    .product-name {
        margin: 0;
        font-size: 1.2rem;
    }

    .btn-danger {
        border-color: #dc3545;
        color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #dc3545;
        color: white;
    }
</style>
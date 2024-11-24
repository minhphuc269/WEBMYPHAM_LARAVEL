@extends('layouts.site')

@section('title', 'Chi tiết đơn hàng')

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
                            <a href="{{ route('orders.index') }}" class="link"><span>Tất cả đơn hàng</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>


                        <li><strong><span> Chi tiết đơn hàng</span></strong></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container mt-5">
            <h1 class="text-center mb-4 text-success">Chi tiết đơn hàng</h1>
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h4 class="card-title">Mã đơn hàng: <strong>{{ $order->order_code }}</strong></h4>
                    <p class="card-text"><strong>Ngày đặt hàng:</strong> {{
                        \Carbon\Carbon::parse($order->created_at)->format('d/m/Y H:i') }}</p>
                    <h5 class="card-text">Phí giảm giá: <strong class="text-danger">{{
                            number_format($order->orderDetails->sum('discount'), 0, ',', '.') }} đ</strong></h5>
                    <h5 class="card-text">Phí vận chuyển: <strong class="text-danger">{{
                            number_format($order->orderDetails->sum('feeship'), 0, ',', '.') }} đ</strong></h5>
                    <h5 class="card-text">Tổng tiền: <strong class="text-danger">{{ number_format($grandTotal, 0, ',', '.')
                            }} đ</strong></h5>
                </div>
            </div>
    
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Thông tin tài khoản</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Tên:</strong> {{ $order->user->name }}</p>
                            <p><strong>Email:</strong> {{ $order->user->email }}</p>
                        </div>
                    </div>
                </div>
    
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5 class="mb-0">Thông tin giao hàng</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>Địa chỉ:</strong> {{ $order->delivery_address }}</p>
                            <p><strong>Số điện thoại:</strong> {{ $order->delivery_phone }}</p>
                            <p><strong>Ghi chú:</strong> {{ $order->note ?? 'Không có' }}</p>
                            <p><strong>Hình thức thanh toán:</strong> {{ ucfirst($order->type) }}</p>
                        </div>
                    </div>
                </div>
            </div>
    
            <h4 class="mb-3">Chi tiết sản phẩm</h4>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="bg-success text-white">
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Số lượng</th>
                            <th>Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                        <tr>
                            <td>
                                <img src="{{ asset('images/products/'.$detail->product->image) }}"
                                    alt="{{ $detail->product->name }}" class="img-fluid"
                                    style="max-width: 150px; max-height: 150px;">
                            </td>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->qty }}</td>
                            <td>{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    
            {{-- <div class="text-center mt-4">
                <form action="{{ route('orders.cancel', $order->id) }}" method="POST"
                    onsubmit="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="background-color: #dc3545; color: white;">Hủy đơn
                        hàng</button>
                </form>
            </div> --}}
    
        </div>
    </section>
</div>

@endsection
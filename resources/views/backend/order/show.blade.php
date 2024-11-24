@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết đơn hàng</h1>
            </div>
           
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    {{-- <a href="{{ route('admin.order.delete', $order->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Hủy đơn
                    </a> --}}
                    <a class="btn btn-sm btn-info" href="{{ route('admin.order.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>

        <!-- Thông tin tài khoản -->
        <h4 style="padding-top: 20px; padding-left: 20px;">Thông tin tài khoản</h4>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">Tên tài khoản</th>
                        <th class="text-center" style="width:30%;">Số điện thoại</th>
                        <th class="text-center" style="width:45%;">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $order->user->name }}</td>

                        <td>{{ $order->user->phone}}</td>

                        <td>{{ $order->user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Thông tin vận chuyển hàng -->
        <h4 style="padding-top: 30px; padding-left: 20px;">Thông tin vận chuyển hàng</h4>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                
                <tbody>
                    <tr>
                        <td><strong>Mã đơn hàng</strong></td>
                        <td>{{ $order->order_code }}</td>
                    </tr>
                    <tr>
                        <td><strong>Địa chỉ giao hàng</strong></td>
                        <td>{{ $order->delivery_address }}</td>
                    </tr>
                    <tr>
                        <td><strong>Số điện thoại</strong></td>
                        <td>{{ $order->delivery_phone }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $order->delivery_email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Ghi chú</strong></td>
                        <td>{{ $order->note }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hình thức thanh toán</strong></td>
                        <td>{{ $order->type == 1 ? 'Chuyển khoản' : 'Thanh toán khi nhận hàng' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Chi tiết đơn hàng -->
        <h4 style="padding-top: 30px; padding-left: 20px;">Chi tiết đơn hàng</h4>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:5%;">STT</th>
                        <th class="text-center" style="width:45%;">Tên sản phẩm</th>
                        <th class="text-center" style="width:15%;">Số lượng</th>
                        <th class="text-center" style="width:15%;">Giá</th>
                        <th class="text-center" style="width:20%;">Tổng tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderDetails as $key => $detail)
                    <tr>
                        <td class="text-center">{{ $key + 1 }}</td>
                        <td>{{ $detail->product->name ?? 'Không có' }}</td>
                        <td class="text-center">{{ $detail->qty }}</td>
                        <td class="text-center">{{ number_format($detail->price, 0, ',', '.') }} đ</td>
                        <td class="text-center">{{ number_format($detail->amount, 0, ',', '.') }} đ</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Tổng cộng chi phí -->
            <div class="row" style="padding-top: 20px; padding-left: 10px;">
                <div class="col-6 text-left">
                    <p><strong>Phí vận chuyển:</strong> {{ number_format($detail->feeship, 0, ',', '.') }} đ</p>
                    <p><strong>Phí giảm giá:</strong> {{ number_format($detail->discount, 0, ',', '.') }} đ</p>
                    <p>
                        <strong>Tổng tiền:</strong> 
                        {{ number_format($orderDetails->sum(function($detail) {
                            return $detail->amount + $detail->feeship - $detail->discount;
                        }), 0, ',', '.') }} đ
                    </p>
                </div>
            </div>
            <!-- Thêm phần chọn trạng thái đơn hàng -->
<div class="card-body">
    <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status_order">Trạng thái đơn hàng</label>
            <select name="status_order" id="status_order" class="form-control">
                <option value="Chờ xác nhận" {{ $order->status_order == 'Chờ xác nhận' ? 'selected' : '' }}>Chờ xác nhận</option>
                <option value="Đang giao hàng" {{ $order->status_order == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao hàng</option>
                <option value="Đã giao" {{ $order->status_order == 'Đã giao' ? 'selected' : '' }}>Đã giao</option>
                <option value="Hủy" {{ $order->status_order == 'Hủy' ? 'selected' : '' }}>Hủy</option>
            </select>
        </div>
        <button type="submit" class="btn btn-sm btn-success">Cập nhật trạng thái</button>
    </form>
    
</div>

            <div class="text-center mt-3">
                <a href="{{ route('admin.order.print', $order->id) }}" class="btn btn-sm btn-primary">
                  In đơn hàng
                  <i class="fas fa-print"></i>
                </a>
              </div>
              
            
        </div>
    </div>
</section>
@endsection

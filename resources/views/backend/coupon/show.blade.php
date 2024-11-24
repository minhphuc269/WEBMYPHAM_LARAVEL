@extends('layouts.admin')

@section('title', 'Chi tiết mã giảm giá')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết mã giảm giá</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.coupon.edit', $coupon->id) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.coupon.delete', $coupon->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.coupon.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body text-center">
            <img class="img-fluid rounded mb-4" src="{{ asset('images/coupons/' . $coupon->image) }}" alt="{{ $coupon->name }}" style="max-height: 300px;">

            <h5 class="mb-3">Tên mã giảm giá: <strong>{{ $coupon->name }}</strong></h5>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table" style="border: none;">
                                <tbody>
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $coupon->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mã giảm:</strong></td>
                                        <td>{{ $coupon->code }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Số lượng:</strong></td>
                                        <td>{{ $coupon->qty }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Giảm theo:</strong></td>
                                        <td>
                                            @if($coupon->condition_coupon == 1)
                                                Phần trăm
                                            @elseif($coupon->condition_coupon == 2)
                                                Tiền
                                            @else
                                                Không xác định
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Số % hoặc tiền giảm:</strong></td>
                                        <td>{{ $coupon->pricesale }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table" style="border: none;">
                                <tbody>
                                    <tr>
                                        <td><strong>Ngày tạo:</strong></td>
                                        <td>{{ $coupon->created_at->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người tạo:</strong></td>
                                        <td>{{ $coupon->creator->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày cập nhật:</strong></td>
                                        <td>
                                            @if($coupon->created_at != $coupon->updated_at)
                                                {{ $coupon->updated_at->format('d/m/Y H:i:s') }}
                                            @else
                                                Không có
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người cập nhật:</strong></td>
                                        <td>{{ $coupon->updater->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Trạng thái:</strong></td>
                                        <td>{{ $coupon->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Custom Styles -->
<style>
    .card-title {
        margin-bottom: 10px;
    }
    .card-body p {
        line-height: 1.6;
        font-size: 14px;
    }
    .mb-3 {
        margin-bottom: 1.5rem; /* Cải thiện khoảng cách giữa các thẻ */
    }
    .content-header h1 {
        font-size: 24px;
        margin-bottom: 15px; /* Tăng khoảng cách giữa tiêu đề và nội dung */
    }
</style>

@endsection

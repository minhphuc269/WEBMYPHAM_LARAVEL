@extends('layouts.admin')

@section('title', 'Chi tiết sản phẩm')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết sản phẩm</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa 
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>

        <h5 class="card-title text-center" style="font-size: 1.5rem; font-weight: bold; margin-top: 10px; margin-bottom: 20px;">
            Tên sản phẩm: {{ $product->name }}
        </h5>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img class="img-fluid rounded" src="{{ asset('images/products/' . $product->image) }}" alt="{{ $product->name }}" style="max-height: 300px;">
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Mô tả:</strong></h5>
                            <p>{{ $product->description }}</p>
                            <h5 class="card-title"><strong>Chi tiết sản phẩm:</strong></h5>
                            <p>{{ $product->detail }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table" style="border: none;">
                                <tbody>
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $product->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Danh mục:</strong></td>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Thương hiệu:</strong></td>
                                        <td>{{ $product->brand->name }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Giá:</strong></td>
                                        <td>{{ number_format($product->price) }} VNĐ</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Giá sale:</strong></td>
                                        <td>
                                            {{ $product->pricesale > 0 ? number_format($product->pricesale) . ' VNĐ' : 'Không có' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Số lượng:</strong></td>
                                        <td>{{ $product->qty }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Trạng thái:</strong></td>
                                        <td>{{ $product->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table" style="border: none;">
                                <tbody>
                                    <tr>
                                        <td><strong>Ngày tạo:</strong></td>
                                        <td>{{ $product->created_at->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người tạo:</strong></td>
                                        <td>{{ $product->creator->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày cập nhật:</strong></td>
                                        <td>
                                            @if($product->created_at != $product->updated_at)
                                                {{ $product->updated_at->format('d/m/Y H:i:s') }}
                                            @else
                                                Không có
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người cập nhật:</strong></td>
                                        <td>{{ $product->updater->name ?? 'Không có' }}</td>
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

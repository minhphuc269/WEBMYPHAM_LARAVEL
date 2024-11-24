@extends('layouts.admin')
@section('title', 'Quản lí vận chuyển')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết vận chuyển</h1>
            </div>
           
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                   
                    <a href="{{ route('admin.delivery.delete', $delivery->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.delivery.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">
                            <strong>Tên trường</strong>
                        </th>
                        <th class="text-center" style="width:70%;">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $delivery->id }}</td>
                    </tr>
                    <tr>
                        <td>Tên tỉnh/thành phố</td>
                        <td>{{ $delivery->city ? $delivery->city->name : 'Không xác định' }}</td>
                    </tr>
                    <tr>
                        <td>Tên quận/huyện</td>
                        <td>{{ $delivery->district ? $delivery->district->name : 'Không xác định' }}</td>
                    </tr>
                    <tr>
                        <td>Tên xã/thị trấn</td>
                        <td>{{ $delivery->town ? $delivery->town->name : 'Không xác định' }}</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td>{{ $delivery->feeship }}</td>
                    </tr>
                    <tr>
                        <td>Ngày tạo</td>
                        <td>{{ $delivery->created_at }}</td>
                    </tr>
                    <tr>
                        <td>Người tạo</td>
                        <td>{{ $delivery->creator->name ?? 'Không có' }}</td>
                    </tr>
                    <tr>
                        <td>Ngày cập nhật</td>
                        <td>
                            @if($delivery->created_at != $delivery->updated_at)
                            {{ $delivery->updated_at }}
                            @else
                            Không có
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Người cập nhật</td>
                        <td>{{ $delivery->updater->name ?? 'Không có' }}</td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>{{ $delivery->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

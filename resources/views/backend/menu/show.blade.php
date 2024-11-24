@extends('layouts.admin')

@section('title', 'Quản lí Menu')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết menu</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.menu.edit', $menu->id) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.menu.delete', $menu->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa 
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.menu.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body text-center">
            <h5 class="mb-3">Tên menu: <strong>{{ $menu->name }}</strong></h5>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body">
                            <table class="table" style="border: none;">
                                <tbody>
                                    <tr>
                                        <td><strong>ID:</strong></td>
                                        <td>{{ $menu->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Liên kết:</strong></td>
                                        <td>{{ $menu->link }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kiểu:</strong></td>
                                        <td>{{ $menu->type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Vị trí:</strong></td>
                                        <td>{{ $menu->position }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Menu cha:</strong></td>
                                        <td>{{ $menu->parent->name ?? 'Không có' }}</td>
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
                                        <td><strong>Trạng thái:</strong></td>
                                        <td>{{ $menu->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày tạo:</strong></td>
                                        <td>{{ $menu->created_at->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người tạo:</strong></td>
                                        <td>{{ $menu->creator->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày cập nhật:</strong></td>
                                        <td>
                                            @if($menu->created_at != $menu->updated_at)
                                                {{ $menu->updated_at->format('d/m/Y H:i:s') }}
                                            @else
                                                Không có
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người cập nhật:</strong></td>
                                        <td>{{ $menu->updater->name ?? 'Không có' }}</td>
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

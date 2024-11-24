@extends('layouts.admin')

@section('title', 'Chi tiết bài viết')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết bài viết</h1>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.post.edit', $post->id)}}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.post.delete', $post->id)}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa 
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route("admin.post.index")}}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>

        <h5 class="card-title text-center" style="font-size: 1.5rem; font-weight: bold; margin-top: 10px; margin-bottom: 20px;">
            Tiêu đề bài viết: {{ $post->title }}
        </h5>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <img class="img-fluid rounded" src="{{ asset('images/posts/' . $post->image) }}"
                                alt="{{ $post->title }}" style="max-height: 300px;">
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Nội dung:</strong></h5>
                            <p>{{ $post->detail }}</p>
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
                                        <td>{{ $post->id }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Chủ đề:</strong></td>
                                        <td>{{ $post->topic ? $post->topic->name : 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Slug:</strong></td>
                                        <td>{{ $post->slug }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kiểu:</strong></td>
                                        <td>{{ $post->type }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Mô tả:</strong></td>
                                        <td>{{ $post->description }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày tạo:</strong></td>
                                        <td>{{ $post->created_at->format('d/m/Y H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người tạo:</strong></td>
                                        <td>{{ $post->creator->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Ngày cập nhật:</strong></td>
                                        <td>
                                            @if($post->created_at != $post->updated_at)
                                                {{ $post->updated_at->format('d/m/Y H:i:s') }}
                                            @else
                                                Không có
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Người cập nhật:</strong></td>
                                        <td>{{ $post->updater->name ?? 'Không có' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Trạng thái:</strong></td>
                                        <td>{{ $post->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
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
        margin-bottom: 1.5rem; /* Improve spacing between cards */
    }
    .content-header h1 {
        font-size: 24px;
        margin-bottom: 15px; /* Increase spacing between header and content */
    }
</style>

@endsection

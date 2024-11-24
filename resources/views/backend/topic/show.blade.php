@extends('layouts.admin')
@section('title','Quản lí chủ đề')
@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết chủ đề</h1>
            </div>
           
        </div>
    </div>
</section>
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.topic.edit', $topic->id)}}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <a href="{{ route('admin.topic.delete', $topic->id)}}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa 
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route("admin.topic.index")}}">
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
                        <td>{{ $topic->id }}</td>
                     </tr>
                     <tr>
                        <td>Tên chủ đề</td>
                        <td>{{ $topic->name }}</td>
                     </tr>
                     <tr>
                        <td>Slug</td>
                        <td>{{ $topic->slug }}</td>
                     </tr>
                     <tr>
                        <td>Mô tả</td>
                        <td>{{ $topic->description ?? 'Không có' }}</td>
                     </tr>
                     <tr>
                        <td>Sắp xếp</td>
                        <td>{{ $topic->sortedAfter->name ?? 'Không có'  }}</td>
                     </tr>
                     <tr>
                         <td>Ngày tạo</td>
                         <td>{{ $topic->created_at }}</td>
                     </tr>
                     <tr>
                         <td>Người tạo</td>
                         <td>{{ $topic->creator->name ?? 'Không có' }}</td>
                     </tr>
                     <tr>
                         <td>Ngày cập nhật</td>
                         <td>
                             @if($topic->created_at != $topic->updated_at)
                                 {{ $topic->updated_at }}
                             @else
                                 Không có
                             @endif
                         </td>
                     </tr>
                     <tr>
                         <td>Người cập nhật</td>
                         <td>{{ $topic->updater->name ?? 'Không có' }}</td>
                     </tr>
                     <tr>
                         <td>Trạng thái</td>
                         <td>{{ $topic->status == 1 ? 'Xuất bản' : 'Chưa xuất bản' }}</td>
                     </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
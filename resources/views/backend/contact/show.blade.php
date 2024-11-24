@extends('layouts.admin')

@section('title', 'Quản lí liên hệ')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết liên hệ</h1>
            </div>
           
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    {{-- {{-- <a href="{{ route('admin.contact.reply', $contact->id) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-reply"></i> Trả lời
                    </a> 
                    <a href="{{ route('admin.contact.delete', $contact->id) }}" class="btn btn-sm btn-danger">
                        <i class="fas fa-trash"></i> Xóa  --}}
                    </a>
                    <a class="btn btn-sm btn-info" href="{{ route("admin.contact.index") }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <h4>Thông tin người gửi</h4>
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>ID</td>
                        <td>{{ $contact->id }}</td>
                    </tr>
                    <tr>
                        <td>Tên người liên hệ</td>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>{{ $contact->phone }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header">
            <h4>Chi tiết liên hệ</h4>
        </div>
        
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <tbody>
                    <tr>
                        <td>Tiêu đề</td>
                        <td>{{ $contact->title }}</td>
                    </tr>
                    <tr>
                        <td>Nội dung</td>
                        <td>{{ $contact->content }}</td>
                    </tr>
                    <tr>
                        <td>Câu trả lời</td>
                        <td>{{ $contact->reply ?? 'Chưa có câu trả lời' }}</td>
                    </tr>
                    <tr>
                        <td>Ngày trả lời</td>
                        <td>{{ $contact->created_at }}</td>
                    </tr>
                    {{-- <tr>
                        <td>Ngày cập nhật trả lời</td>
                        <td>
                            @if($contact->created_at != $contact->updated_at)
                                {{ $contact->updated_at }}
                            @else
                                Không có
                            @endif
                        </td>
                    </tr> --}}
                 
                 
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

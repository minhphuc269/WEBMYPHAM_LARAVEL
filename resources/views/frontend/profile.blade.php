@extends('layouts.site')
@section('title', 'Tài khoản')
@section('content')

<div class="subheader">
    <div class="container">
        <x-menu-list-cate />
        <x-main-menu />
    </div>
</div>
<section class="bread-crumb mb-3">
    <span class="crumb-border"></span>
    <div class="container">
        <div class="row">
            <div class="col-12 a-left">
                <ul class="breadcrumb m-0 px-0">
                    <li class="home">
                        <a href="{{ route('site.home') }}" class="link"><span>Trang chủ</span></a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                    </li>
                    <li><strong><span>Tài khoản</span></strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1 class="text-center mb-4" style="color: #f40e38;">Thông tin tài khoản</h1>

    <!-- Hiển thị thông báo thành công nếu có -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card mb-4 mx-auto" style="max-width: 600px;">
        <div class="card-header text-white d-flex justify-content-between align-items-center">
            <button class="btn" 
                    style="background-color: transparent; border: none; margin-left: auto;" 
                    data-toggle="modal" 
                    data-target="#editModal">
                <i class="fas fa-edit" style="color: #d82e4d; font-size: 24px;"></i>
            </button>
        </div>
        
        <div class="card-body text-center">
            <img 
                src="{{ $user->image ? asset('images/users/'.$user->image) : asset('images/user.jpg') }}" 
                alt="Avatar người dùng" 
                class="rounded-circle mb-3" 
                style="width: 150px; height: 150px; object-fit: cover;"
                id="userImage" 
                onclick="document.getElementById('imageInput').click();"
            >
            <form action="{{ route('user.updateImage', $user->id) }}" method="POST" enctype="multipart/form-data" id="imageForm" style="display: none;">
                @csrf
                @method('PUT')
                <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event); document.getElementById('imageForm').submit();" style="display: none;"/> 
            </form>
            <p><strong>Tên:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Số điện thoại:</strong> {{ $user->phone }}</p>
            <p><strong>Giới tính:</strong> {{ $user->gender == 'male' ? 'Nam' : 'Nữ' }}</p>
            <p><strong>Địa chỉ:</strong> {{ $user->address }}</p>

            <!-- Nút chuyển trang sang đổi mật khẩu -->
            <a href="{{ route('user.changePasswordForm') }}" class="btn custom-btn mt-3">Đổi mật khẩu</a>
        </div>
    </div>
</div>

<!-- Modal chỉnh sửa thông tin -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Chỉnh sửa thông tin tài khoản</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Tên</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Số điện thoại</label>
                        <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}">
                    </div>

                    <div class="form-group">
                        <label for="address">Địa chỉ</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">Giới tính</label>
                        <select class="form-control" name="gender" id="gender">
                            <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Nam</option>
                            <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Nữ</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Thêm CSS tùy chỉnh -->
<style>
    .custom-btn {
        background-color: #ffc107; /* Màu vàng */
        color: #d81b60; /* Màu chữ */
        border: none; /* Bỏ viền */
    }

    .custom-btn:hover {
        background-color: #e0a800; /* Màu vàng tối hơn khi hover */
    }
</style>

<script>
   function previewImage(event) {
       const userImage = document.getElementById('userImage');
       userImage.src = URL.createObjectURL(event.target.files[0]);
       console.log('Image selected:', event.target.files[0]);
   }
</script>

@endsection
@section('header')

@endsection

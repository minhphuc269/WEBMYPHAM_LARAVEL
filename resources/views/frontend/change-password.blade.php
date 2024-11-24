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
                    <li><strong><span>Đổi mật khẩu</span></strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<div class="container">
    <h1 class="text-center mb-4" style="color: #f40e38;">Đổi mật khẩu</h1>

    <div class="card mb-4 mx-auto" style="max-width: 600px;">
        <div class="card-body">
            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('user.changePassword') }}">
                @csrf
                <div class="form-group">
                    <label for="current_password">Mật khẩu hiện tại</label>
                    <input type="password" name="current_password" id="current_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="new_password">Mật khẩu mới</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="confirm_password">Xác nhận mật khẩu mới</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn custom-btn mt-3">Đổi mật khẩu</button> <!-- Sử dụng lớp CSS tùy chỉnh -->
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .custom-btn {
        background-color: #ffc107; /* Màu vàng */
        color:#d81b60 ; /* Màu chữ */
        border: none; /* Bỏ viền */
    }

    .custom-btn:hover {
        background-color: #e0a800; /* Màu vàng tối hơn khi hover */
    }
</style>

@endsection
@section('header')

@endsection

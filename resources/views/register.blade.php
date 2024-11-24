@extends('layouts.site')
@section('title', 'Đăng kí')
@section('content')

    <!-- subheader == mobile nav -->
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
                        <li><strong><span>Đăng kí tài khoản</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container margin-bottom-20 card py-2">
            <div class="wrap_background_aside margin-bottom-40 page_login">
                <div class="heading-bar text-center">
                    <h1 class="title_page mb-0">Đăng kí tài khoản</h1>
                    <p class="mb-0">Bạn đã có tài khoản ?
                        <a href="{{ route('website.getlogin') }}" class="btn-link-style btn-register"
                            style="text-decoration: underline; color: blue;"> Đăng nhập tại đây</a>
                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 offset-md-3 py-3 mx-auto">
                        <div class="page-login py-3">
                            <div id="register">
                                <h2 class="text-center">
                                    Thông tin cá nhân
                                </h2>
                                @if (session('message'))
                                    <div class="alert alert-danger">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                {{-- FORM --}}
                                <form action="{{ route('register.post') }}" method="POST">
                                    @csrf


                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="fullname">Họ và tên:</label>
                                        <input type="text" class="form-control" id="fullname" name="name" value="{{ old('name') }}">
                                        @error('fullname')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Mật khẩu:</label>
                                        <input type="password" class="form-control" id="password" name="password" >
                                        @error('password')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="confirm_password">Xác nhận mật khẩu:</label>
                                        <input type="password" class="form-control" id="confirm_password" name="password_confirmation">
                                        @error('password_confirmation')
                                            <span>{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Số điện thoại</label>
                                        <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Giới tính</label>
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="" disabled selected>Chọn giới tính</option>
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                        @error('gender')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address" id="address" >
                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="pull-xs-left button_bottom a-center mb-3">
                                        <button class="btn btn-block btn-style btn-login" type="submit" value="Đăng kí">Đăng kí</button>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('header')
    <link rel="stylesheet" href="home.css">
    <style>
        .btn-style {
            background-color: rgb(255, 225, 0) !important; /* Màu nền vàng */
            color: #d82e4d !important; /* Màu chữ #d82e4d */
            transition: color 0.3s; /* Hiệu ứng chuyển màu */
            border-radius: 50px !important;
        }
        
        .btn-style:hover {
            color: black !important; /* Màu chữ đen khi hover */
        }
        </style>
        
@endsection


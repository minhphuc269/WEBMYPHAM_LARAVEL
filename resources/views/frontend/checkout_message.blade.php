@extends('layouts.site')
@section('title', 'Thông báo đặt hàng')
@section('content')
<div class="container">
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
                        <li><strong><span>Thông báo</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="text-center">
        <img class="img-fluid" src="{{ asset('images/Check.gif') }}" alt="Đặt hàng thành công"
             style="width: 150px; margin: 0 auto;">
    </div>
    <h1 class="title_page collection-title mb-3 text-center" style="font-size: 2.5em; font-weight: bold; color: #d82e4d;">
        Đặt hàng thành công!
    </h1>
    <div class="text-center mb-4">
        <div class="shipping-info d-inline-block" style="background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            @php
            $user = Auth::user();
            @endphp
            <h2 style="font-size: 1.5em; font-weight: bold; color: #d82e4d;">Thông tin vận chuyển của bạn</h2>
            <p style="font-size: 1em; font-weight: normal; color: #555;">
                {{ $user->name }} &bull; {{ $user->phone }} &bull; {{ $user->email }} &bull; {{ $user->address }}
            </p>
        </div>
    </div>
    <div class="text-center mb-4">
        <a href="{{ route('site.home') }}" class="btn btn-primary" style="background-color: #d82e4d; border-color: #d82e4d; color: white; padding: 10px 20px; border-radius: 5px;">
            Tiếp tục mua sắm
        </a>
    </div>
</div>
@endsection
@section('header')
<link rel="stylesheet" href="home.css">
@endsection

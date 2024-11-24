@extends('layouts.site')
@section('title', 'Trang chủ')
@section( 'content')

<div class="subheader ">
    <div class="container ">
        <x-menu-list-cate />
        <x-main-menu />


    </div>
</div>
{{-- SLIDER --}}
<x-slider />

{{-- DANH MỤC NỔI BẬT --}}
<x-category-best :categories="$categories" />

<x-coupon/>

{{-- SẢN PHẨM SALE --}}
<x-flash-sale />

{{-- SẢN PHẨM MỚI --}}
<x-product-new />

{{-- SẢN PHẨM THEO DANH MỤC --}}
<x-product-category-home />

{{-- THƯƠNG HIỆU NỔI BẬT --}}
<x-brand-best :brands="$brands" />

{{-- TIN KHUYẾN MÃI --}}
<x-last-post />


@endsection
@section('header')
{{-- coupon --}}
<link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-lite.css?1692086228721">
<style>
    :root {
        --text-color: #000000;
        --text-secondary-color: #666666;
        --primary-color: #d82e4d;
        --secondary-color: #fbd947;
        --price-color: #f3283d;
        --topbar-bg: #fdd835;
        --topbar-color: #000000;
        --subheader-background: #e5677d;
        --subheader-color: #f9f9f6;
        --label-background: #fed632;
        --label-color: #ee4d2d;
        --footer-bg: #efefef;
        --footer-color: #000000;
        --show-loadmore: none !important;
        --order-loadmore: -1 !important;
        --sale-pop-color: #d82e4d;
        --buynow-color: #ffffff;
        --buynow-text-color: #d82e4d;
        --addtocart-color: #d82e4d;
        --addtocart-text-color: #ffffff;
        --cta-color: #d82e4d;
        --coupon-title-color: #d82e4d;
        --coupon-button-color: #d82e4d;
        --col-menu: 3;
        --link-color: #2F80ED;
    }
</style>
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/main.scss.css?1692086228721" rel="stylesheet"
    type="text/css" media="all">
@endsection
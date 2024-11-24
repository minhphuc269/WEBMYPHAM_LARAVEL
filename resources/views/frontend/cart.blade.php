@extends('layouts.site')
@section('title', 'Giỏ hàng')
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
                        <li><strong><span> Giỏ hàng</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <h1 class="title_page collection-title mb-0">
        Giỏ hàng
    </h1>
    <div class="row">
        <form action="{{ route('site.cart.update') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <th class="text-center">ID</th>
                    <th class="text-center" style="width:90px">Hình</th>
                    <th class="text-center" style="width:300px">Tên sản phẩm</th>
                    <th class="text-center" style="width:200px">Số lượng</th>
                    <th class="text-center">Giá</th>
                    <th class="text-center">Thành tiền</th>
                    <th class="text-center"></th>
                </thead>
                <tbody>
                    @php
                    $totalMoney=0;
                    @endphp
                    @foreach ($list_cart as $row_cart )
                    <tr>
                        <td>{{ $row_cart['id'] }}</td>
                        <td>
                            <img class="img-fluid" src="{{ asset('images/products/'.$row_cart['image']) }}"
                                alt="{{ $row_cart['image'] }}">
                        </td>
                        <td>{{ $row_cart['name'] }}</td>
                        <td class="text-center">
                            {{-- <input type="number" style="width: 60px" min="1" name="qty[{{ $row_cart['id'] }}]"
                                value="{{ $row_cart['qty'] }}"> --}}
                            <div class="d-flex justify-content-center">
                                <div class="custom input_number_product custom-btn-number text-center">
                                    <button class="btn btn_num num_1 button button_qty hover-btn" type="button"
                                        onclick="decreaseQuantity({{ $row_cart['id'] }})">
                                        <svg class="icon">
                                            <use xlink:href="#icon-minus"></use>
                                        </svg>
                                    </button>
                                    <input type="text" min="1" name="qty[{{ $row_cart['id'] }}]"
                                        value="{{ $row_cart['qty'] }}" maxlength="3"
                                        class="form-control prd_quantity pd-qtym"
                                        style="color:#d82e4d;border-color: #d82e4d;">
                                    <button class="btn btn_num num_2 button button_qty hover-btn" type="button"
                                        onclick="increaseQuantity({{ $row_cart['id'] }})">
                                        <svg class="icon">
                                            <use xlink:href="#icon-plus"></use>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <script>
                                function decreaseQuantity(productId) {
                                        var inputElement = document.querySelector('input[name="qty[' + productId + ']"]');
                                        var currentQty = parseInt(inputElement.value);
                                        if (!isNaN(currentQty) && currentQty > 1) {
                                            inputElement.value = currentQty - 1;
                                            updateCartQuantity(productId, currentQty - 1);
                                        }
                                    }
                                
                                    function increaseQuantity(productId) {
                                        var inputElement = document.querySelector('input[name="qty[' + productId + ']"]');
                                        var currentQty = parseInt(inputElement.value);
                                        inputElement.value = currentQty + 1;
                                        updateCartQuantity(productId, currentQty + 1);
                                    }
                            </script>
                        </td>
                        <td>{{ number_format($row_cart['price']) }}</td>
                        <td>
                            <span class="product-price price">{{ number_format($row_cart['price']*$row_cart['qty'])
                                }}</span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('site.cart.delete',['id'=>$row_cart['id']]) }}">
                                <i class="fas fa-trash icon-large-red" style="font-size: 24px; color: red;"></i>
                            </a>
                        </td>
                    </tr>
                    @php
                    $totalMoney+=$row_cart['price']*$row_cart['qty'];
                    @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="5">
                            <a class="btn btn-success px-3" href="{{ route('site.home') }}">Mua thêm</a>
                            <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
                            <a class="btn btn-info px-3" href="{{ route('site.cart.checkout') }}">Thanh toán</a>
                        </th>
                        <th colspan="2">
                            <span class="product-price price"> <strong>Tổng tiền: {{ number_format($totalMoney)
                                    }}</strong></span>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
</div>
@endsection

@section('header')
<link rel="stylesheet" href="home.css">
<style>
    .btn.btn-success,
    .btn.btn-primary,
    .btn.btn-info {
        background-color: #d82e4d;
        border-color: #d82e4d;
        color: #fff;
    }
    .button_qty:hover {
        background-color: #d82e4d;
        border-color: #d82e4d;
    }
</style>
@endsection
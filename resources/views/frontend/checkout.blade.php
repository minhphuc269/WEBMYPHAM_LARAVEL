@extends('layouts.site')
@section('title', 'Thanh toán')
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
                        <li><strong><span> Thanh toán</span></strong></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <form action="{{ route('site.cart.docheckout') }}" method="post">
        @csrf
        <div class="row">

            <!-- Cột thông tin người đặt hàng -->
            <div class="col-md-4">
                <h4>Thông tin người đặt hàng</h4>
                @if (!Auth::check())
                <div class="row">
                    <div class="col-12">
                        <h5>Hãy đăng nhập để thanh toán</h5>
                        <a href="{{ route('website.getlogin') }}" class="btn btn-primary">Đăng nhập</a>
                    </div>
                </div>
                @else
                <form action="{{ route('site.cart.docheckout') }}" method="post">
                    @csrf
                    @php
                    $user = Auth::user();
                    @endphp
                    <div class="form-group">
                        <label>Họ tên</label>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="city">Chọn tỉnh/thành phố</label>
                        <select name="id_city" id="city" class="form-control">
                            <option value="">----Chọn tỉnh/thành phố----</option>
                            @foreach ($cities as $city)
                            <option value="{{ $city->matp }}">{{ $city->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="district">Chọn quận/huyện</label>
                        <select name="id_district" id="district" class="form-control">
                            <option value="">----Chọn quận/huyện----</option>
                            @foreach ($districts as $district)
                            <option value="{{ $district->maqh }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="town">Chọn xã/phường</label>
                        <select name="id_town" id="town" class="form-control">
                            <option value="">----Chọn xã/phường----</option>
                            @foreach ($towns as $town)
                            <option value="{{ $town->xaid }}">{{ $town->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="address">Tên đường, số nhà</label>
                        <textarea name="address" id="address" class="form-control" rows="3"
                            placeholder="Nhập tên đường và số nhà"></textarea>
                    </div>
                </form>

                @endif
            </div>

            <!-- Cột phương thức thanh toán -->
            <div class="col-md-3">
                <h4>Phương thức thanh toán</h4>
                <form>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment1" value="cod"
                            checked>
                        <label class="form-check-label" for="payment1">Thanh toán khi nhận hàng (COD)</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="payment_method" id="payment2" value="bank">
                        <label class="form-check-label" for="payment2">Thanh toán qua Vnpay</label>
                    </div>
                   
                      
                    </form>

                    <div class="form-group mt-3">
                        <label>Chú ý</label>
                        <textarea name="note" class="form-control" rows="4"></textarea>
                    </div>

            </div>

            <!-- Cột thông tin đơn hàng -->
            <div class="col-md-4 col-lg-5">
                <h4>Thông tin đơn hàng</h4>
                <table class="table table-bordered">
                    <thead>
                        <th class="text-center" style="width:90px">Hình</th>
                        <th class="text-center" style="width:300px">Tên sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Thành tiền</th>
                    </thead>
                    <tbody>
                        @php
                        $totalMoney = 0;
                        @endphp
                        @foreach ($list_cart as $row_cart)
                        <tr>
                            <td>
                                <img class="img-fluid" src="{{ asset('images/products/'.$row_cart['image']) }}"
                                    alt="{{ $row_cart['name'] }}">
                            </td>
                            <td>{{ $row_cart['name'] }}</td>
                            <td class="text-center">{{ number_format($row_cart['price']) }}₫</td>
                            <td class="text-center">{{ $row_cart['qty'] }}</td>
                            <td class="text-center">{{ number_format($row_cart['price'] * $row_cart['qty']) }}₫</td>
                        </tr>
                        @php
                        $totalMoney += $row_cart['price'] * $row_cart['qty'];
                        @endphp
                        @endforeach
                    </tbody>
                </table>

                <!-- Thêm ô nhập mã giảm giá -->
                <div class="form-group mt-3 d-flex align-items-center">
                    <input type="text" id="coupon_code" name="coupon_code" class="form-control me-2 coupon-input"
                        placeholder="Nhập mã giảm giá">
                    <button type="button" class="btn btn-primary coupon-button" id="apply_coupon">Áp dụng</button>
                </div>
                <div id="coupon_message" class="text-danger mt-2"></div> <!-- Thông báo coupon -->

                <div class="col-md-12">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tạm tính</span>
                            <strong id="subtotal">{{ number_format($totalMoney) }}₫</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Phí vận chuyển</span>
                            <strong id="shipping-fee">{{ number_format($shippingFee) }}₫</strong>
                        </li>

                        <li class="list-group-item d-flex justify-content-between" id="discount_item"
                            style="display: none;">
                            <span>Tổng voucher giảm giá</span>
                            <strong id="discount_amount">-0₫</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng cộng</span>
                            <strong id="total">{{ number_format($totalMoney + $shippingFee) }}₫</strong>
                        </li>

                    </ul>
                </div>
                {{-- <form action="{{ route('payment.vnpay') }}" method="post">
                    @csrf

                    <button type="submit" name="redirect" class="btn btn-outline-secondary">Thanh
                        toán</button>
                    <form />  --}}
                <div class="text-end mt-3">
                    <a href="{{ route('site.cart.index') }}" class="btn btn-outline-secondary">❮ Quay về giỏ hàng</a>
                    <button type="submit" class="btn btn-success">Đặt hàng</button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('header')
<link rel="stylesheet" href="home.css">
<style>
    /* CSS styles */
    .btn.btn-success {
        background-color: #28a745;
        color: #fff;
        border-color: #28a745;
        font-size: 14px;
    }

    .btn.btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }

    .table thead th {
        font-size: 12px;
    }

    .table tbody td {
        font-size: 12px;
    }

    .form-check-label {
        font-size: 14px;
    }

    .list-group-item {
        font-size: 14px;
    }

    .coupon-input {
        width: 60%;
    }

    /* label */
    .form-group label {
        font-size: 14px;
        /* Thay đổi kích thước chữ ở đây */
        color: #333;
        /* Màu chữ của label */
        padding-left: 10px;
    }
</style>
@endsection

@section('footer')
{{-- Áp mã giảm giá --}}
<script>
    document.getElementById('apply_coupon').addEventListener('click', function() {
        var couponCode = document.getElementById('coupon_code').value;

        fetch("{{ route('site.cart.applyCoupon') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                coupon_code: couponCode,
            }),
        })
        .then(response => response.json())
        .then(data => {
    var messageElement = document.getElementById('coupon_message');
    var discountItem = document.getElementById('discount_item');
    var discountAmountElement = document.getElementById('discount_amount');
    
    if (data.valid) {
        // Cập nhật tổng tiền
        var subtotal = {{ $totalMoney }};
        var discount = data.discount; // Lấy giá trị giảm giá từ response
        var shippingFee = 40000;
        var total = subtotal + shippingFee - discount;

        // Cập nhật discount vào session
        fetch("{{ route('site.cart.saveDiscount') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
            },
            body: JSON.stringify({
                discount: discount,
            }),
        });

        // Hiển thị thông tin giảm giá
        discountItem.style.display = 'block';
        discountAmountElement.innerText = '-' + numberWithCommas(discount) + '₫';

        // Cập nhật tổng cộng
        document.getElementById('total').innerText = numberWithCommas(total) + '₫';
    } else {
        messageElement.innerText = data.message;
    }
})
        .catch(error => console.error('Error:', error));
    });

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
{{-- Địa chỉ --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Khi thay đổi tỉnh/thành phố
        $('#city').on('change', function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: "{{ route('admin.delivery.getDistricts', '') }}/" + cityId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#district').empty();
                        $('#district').append('<option value="">----Chọn quận/huyện----</option>');
                        $.each(data, function(key, value) {
                            $('#district').append('<option value="'+ value.maqh +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#district').empty();
            }
        });

        // Khi thay đổi quận/huyện
        $('#district').on('change', function() {
            var districtId = $(this).val();
            if (districtId) {
                $.ajax({
                    url: "{{ route('admin.delivery.getTowns', '') }}/" + districtId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#town').empty();
                        $('#town').append('<option value="">----Chọn xã/phường----</option>');
                        $.each(data, function(key, value) {
                            $('#town').append('<option value="'+ value.xaid +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('#town').empty();
            }
        });
        // Kiểm tra khi nhấn nút "Đặt hàng"
    $('form').on('submit', function (event) {
        // Kiểm tra nếu không có địa chỉ nào được chọn
        if ($('#city').val() === "" || $('#district').val() === "" || $('#town').val() === "") {
            event.preventDefault(); // Ngăn chặn gửi biểu mẫu
            alert('Vui lòng chọn đầy đủ địa chỉ (tỉnh/thành phố, quận/huyện, xã/phường) trước khi đặt hàng.'); // Thông báo lỗi
        }
    });
    });
</script>
{{-- Phí vận chuyển --}}
<script>
    $(document).ready(function() {
        var totalMoney = {{ $totalMoney }}; 
        var shippingFee = {{ $shippingFee }}; 

        $('#city').change(function() {
            var cityId = $(this).val();
            if (cityId) {
                $.ajax({
                    url: '{{ route("getShippingFee") }}', 
                    method: 'GET',
                    data: { id_city: cityId },
                    success: function(response) {
                        if (response.fee) {
                            shippingFee = parseInt(response.fee); 
                            $('#shipping-fee').text(shippingFee.toLocaleString() + '₫');
                        } else {
                            $('#shipping-fee').text('Không tìm thấy phí vận chuyển');
                        }
                        updateTotal();
                    },
                    error: function() {
                        $('#shipping-fee').text('Không tìm thấy phí vận chuyển');
                    }
                });
            } else {
                $('#shipping-fee').text('{{ number_format($shippingFee) }}₫'); 
                shippingFee = {{ $shippingFee }}; 
                updateTotal();
            }
        });

        function updateTotal() {
            var total = totalMoney + shippingFee; 
            $('#total').text(total.toLocaleString() + '₫'); 
        }

        updateTotal(); 
    });
</script>


@endsection
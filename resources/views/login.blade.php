@extends('layouts.site')
@section('title', 'Đăng nhập')
@section( 'content')

<body class="" style="">
    <div class="subheader ">
        <div class="container ">
            <x-menu-list-cate/>
            <x-main-menu/> 
            
    
        </div>
    </div>

    <div class="opacity_menu"></div>

    <div class="top-banner position-relative" style="background: rgb(167, 2, 8); display: none;">
        <div class="container text-center px-0">
            <a class="position-relative  d-sm-none d-block" style="max-height: 39px;height:  calc( 39 * 100vw /414 )"
                href="/collections/all" title="Banner top">
                <img class="img-fluid position-absolute "
                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/top_banner_mb.jpg?1692086228721"
                    style="left:0" alt="Banner top" width="414" height="39">

            </a>
            <a class="position-relative   d-sm-block d-none " style="max-height: 70px;height:  calc( 70 * 100vw /1410 )"
                href="/collections/all" title="Banner top">
                <picture>

                    <source media="(max-width: 480px)"
                        srcset="//bizweb.dktcdn.net/thumb/large/100/426/076/themes/917889/assets/top_banner.jpg?1692086228721">

                    <img class="img-fluid position-absolute"
                        src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/top_banner.jpg?1692086228721"
                        style="left:0" alt="Banner top" width="1410" height="70">
                </picture>

            </a>
            <button type="button" class="close " aria-label="Close" style="z-index: 9;"><span
                    aria-hidden="true">×</span></button>
        </div>

    </div>
    <script>
        $(document).ready(()=>{
    $('.top-banner .close').click(()=>{
        $('.top-banner').slideToggle()
        sessionStorage.setItem("top-banner",true)
    })


})

    </script>



    </script>
    <section class="bread-crumb mb-3">
        <span class="crumb-border"></span>
        <div class="container ">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb m-0 px-0">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="link"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>

                        <li><strong><span>Đăng nhập tài khoản</span></strong></li>

                    </ul>
                    
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container margin-bottom-20 card py-20">
            <div class="wrap_background_aside margin-bottom-40 page_login">
                <div class="heading-bar text-center">
                    <h1 class="title_page mb-0">Đăng nhập tài khoản</h1>
                    <p class="mb-0">Bạn chưa có tài khoản ?
                        <a href="{{ route('website.register') }}" class="btn-link-style btn-register"
                            style="text-decoration: underline; color: blue;"> Đăng ký tại đây</a>

                    </p>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 offset-md-3 py-3 mx-auto">
                        {{-- Thông báo lỗi --}}
                        @if (session('message'))
                            <div class="alert alert-danger">
                                {{ session('message') }}
                            </div>
                        @endif
                        <div class="page-login ">
                            <div id="login">
                                <form method="post" action="{{ route('website.dologin') }}" id="customer_login" accept-charset="UTF-8">
                                    @csrf
                                    <input name="FormType" type="hidden" value="customer_login">
                                    <input name="utf8" type="hidden" value="true">
                                    <div class="form-signup margin-bottom-15" style="color:red;">
                                    </div>
                                    <div class="form-signup clearfix">
                                        <fieldset class="form-group">
                                            <label>Tên đăng nhập <span class="required">*</span></label>
                                            <input type="text" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,63}$"
                                                class="form-control" value="{{ old('username') }}" name="username" id="username"
                                                placeholder="Tên đăng nhập hoặc email" >
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Mật khẩu <span class="required">*</span> </label>
                                            <div class="input-group" style="position: relative;">
                                                <input type="password" class="form-control" value="" name="password"
                                                    id="password" placeholder="Mật khẩu" 
                                                    maxlength="16" style="padding-right: 40px;">
                                                <button type="submit" class="btn btn-outline-secondary"
                                                    onclick="togglePasswordVisibility()"
                                                    style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%);">
                                                    <i class="fa fa-eye" id="togglePasswordIcon"></i>
                                                </button>
                                            </div>
                                            <small class="d-block my-2">Quên mật khẩu? Nhấn vào <a  href=""
                                                    class="btn-link-style text-primary"> đây </a></small>
                                        </fieldset>
                                        <div class="pull-xs-left button_bottom a-center mb-3">
                                            <button class="btn btn-block btn-style btn-login" type="submit"
                                                value="Đăng nhập">Đăng nhập</button>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <script>
                                function togglePasswordVisibility() {
                                    var passwordField = document.getElementById("customer_password");
                                    var togglePasswordIcon = document.getElementById("togglePasswordIcon");
                                    if (passwordField.type === "password") {
                                        passwordField.type = "text";
                                        togglePasswordIcon.classList.remove("fa-eye");
                                        togglePasswordIcon.classList.add("fa-eye-slash");
                                    } else {
                                        passwordField.type = "password";
                                        togglePasswordIcon.classList.remove("fa-eye-slash");
                                        togglePasswordIcon.classList.add("fa-eye");
                                    }
                                }
                            </script>

                            <!-- Make sure to include Font Awesome for the eye icon -->
                            <link rel="stylesheet"
                                href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">



                            
                        </div>
                        <div class="block social-login--facebooks margin-top-20 text-center">
                            <p class="a-center text-secondary">
                                Hoặc đăng nhập bằng
                            </p>
                            <script>
                                function loginFacebook(){var a={client_id:"947410958642584",redirect_uri:"https://store.mysapo.net/account/facebook_account_callback",state:JSON.stringify({redirect_url:window.location.href}),scope:"email",response_type:"code"},b="https://www.facebook.com/v3.2/dialog/oauth"+encodeURIParams(a,!0);window.location.href=b}function loginGoogle(){var a={client_id:"997675985899-pu3vhvc2rngfcuqgh5ddgt7mpibgrasr.apps.googleusercontent.com",redirect_uri:"https://store.mysapo.net/account/google_account_callback",scope:"email profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/userinfo.profile",access_type:"online",state:JSON.stringify({redirect_url:window.location.href}),response_type:"code"},b="https://accounts.google.com/o/oauth2/v2/auth"+encodeURIParams(a,!0);window.location.href=b}function encodeURIParams(a,b){var c=[];for(var d in a)if(a.hasOwnProperty(d)){var e=a[d];null!=e&&c.push(encodeURIComponent(d)+"="+encodeURIComponent(e))}return 0==c.length?"":(b?"?":"")+c.join("&")}
                            </script>
                            <a href="javascript:void(0)" class="social-login--facebook" onclick="loginFacebook()"><img
                                    width="129px" height="37px" alt="facebook-login-button"
                                    src="//bizweb.dktcdn.net/assets/admin/images/login/fb-btn.svg"></a>
                            <a href="javascript:void(0)" class="social-login--google" onclick="loginGoogle()"><img
                                    width="129px" height="37px" alt="google-login-button"
                                    src="//bizweb.dktcdn.net/assets/admin/images/login/gp-btn.svg"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="addThis_listSharing ">

        <a href="#" id="back-to-top" class="backtop back-to-top d-flex align-items-center justify-content-center show"
            title="Lên đầu trang">


            <svg class="icon" style="transform: rotate(-90deg)">
                <use xlink:href="#icon-arrow"></use>
            </svg>
        </a>


        <ul class="addThis_listing list-unstyled  d-none d-sm-block">

            <li class="addThis_item">
                <a class="addThis_item--icon" href="tel:19006750" rel="nofollow">
                    <img class="img-fluid"
                        src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-phone.svg?1692086228721"
                        alt="Gọi ngay cho chúng tôi" width="44" height="44">
                    <span class="tooltip-text">Gọi ngay cho chúng tôi</span>
                </a>
            </li>
            <li class="addThis_item">
                <a class="addThis_item--icon" href="https://zalo.me/834141234794359440" target="_blank" rel="nofollow">
                    <img class="img-fluid"
                        src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-zalo.svg?1692086228721"
                        alt="Gọi ngay cho chúng tôi" width="44" height="44">
                    <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                </a>
            </li>

        </ul>
    </div>


    <script type="text/javascript">
        function showRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = 'block';
    document.getElementById('login').style.display='none';
}

function hideRecoverPasswordForm() {
    document.getElementById('recover-password').style.display = 'none';
    document.getElementById('login').style.display = 'block';
}

if (window.location.hash == '#recover') { showRecoverPasswordForm() }
    </script>













    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" media="all">
    <link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/fonts.css?1692084315105"
        media="all">
    <link rel="stylesheet"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-4-3-min.css?1692086228721">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/main.scss.css?1692086228721" rel="stylesheet"
        type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/account_oder_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link rel="preload" as="script" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js">
    @endsection
    @section('header')
    <link rel="stylesheet" href="home.css">
    @endsection
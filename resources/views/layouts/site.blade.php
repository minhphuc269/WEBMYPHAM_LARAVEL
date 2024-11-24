<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title')</title>
    @yield('header')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- slider --}}
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!--link css-->
    <svg style="display:none">
        <defs>
            <symbol class="icon " id="icon-cart" viewBox="0 0 16 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.594 16.39a.703.703 0 0 1-.703.704h-.704v.703a.703.703 0 0 1-1.406 0v-.703h-.703a.703.703 0 0 1 0-1.407h.703v-.703a.703.703 0 1 1 1.406 0v.704h.704c.388 0 .703.314.703.703Zm0-10.968v6.75a.703.703 0 0 1-1.406 0V6.125H12.78v2.11a.703.703 0 1 1-1.406 0v-2.11h-6.75v2.11a.703.703 0 1 1-1.406 0v-2.11H1.813v10.969h7.453a.703.703 0 1 1 0 1.406H1.109a.703.703 0 0 1-.703-.703V5.422c0-.388.315-.703.703-.703h2.143A4.788 4.788 0 0 1 8 .5a4.788 4.788 0 0 1 4.748 4.219h2.143c.388 0 .703.315.703.703Zm-4.266-.703A3.38 3.38 0 0 0 8 1.906 3.38 3.38 0 0 0 4.672 4.72h6.656Z"
                    fill="currentColor"></path>
            </symbol>
        </defs>
    </svg>
    <svg style="display:none">
        <defs>
            <symbol id="icon-minus" class="icon icon-minus" viewBox="0 0 16 2" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M15.375 0H0.625C0.279813 0 0 0.279813 0 0.625C0 0.970187 0.279813 1.25 0.625 1.25H15.375C15.7202 1.25 16 0.970187 16 0.625C16 0.279813 15.7202 0 15.375 0Z"
                    fill="#8C9196"></path>
            </symbol>
        </defs>
    </svg>

    <svg style="display:none">
        <defs>
            <symbol id="icon-plus" class="icon icon-plus" viewBox="0 0 93.562 93.562" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path xmlns="http://www.w3.org/2000/svg"
                    d="M87.952,41.17l-36.386,0.11V5.61c0-3.108-2.502-5.61-5.61-5.61c-3.107,0-5.61,2.502-5.61,5.61l0.11,35.561H5.61   c-3.108,0-5.61,2.502-5.61,5.61c0,3.107,2.502,5.609,5.61,5.609h34.791v35.562c0,3.106,2.502,5.61,5.61,5.61   c3.108,0,5.61-2.504,5.61-5.61V52.391h36.331c3.108,0,5.61-2.504,5.61-5.61C93.562,43.672,91.032,41.17,87.952,41.17z"
                    fill="currentColor"></path>
            </symbol>
        </defs>
    </svg>

    <svg style="display:none">
        <defs>
            <symbol class="icon icon-arrow" id="icon-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 490.8 490.8"
                fill="none" aria-hidden="true" focusable="false" role="presentation">
                <path
                    d="M135.685 3.128c-4.237-4.093-10.99-3.975-15.083.262-3.992 4.134-3.992 10.687 0 14.82l227.115 227.136-227.136 227.115c-4.237 4.093-4.354 10.845-.262 15.083 4.093 4.237 10.845 4.354 15.083.262.089-.086.176-.173.262-.262l234.667-234.667c4.164-4.165 4.164-10.917 0-15.083L135.685 3.128z"
                    fill="currentColor"></path>
                <path
                    d="M128.133 490.68a10.667 10.667 0 01-7.552-18.219l227.136-227.115L120.581 18.232c-4.171-4.171-4.171-10.933 0-15.104 4.171-4.171 10.933-4.171 15.104 0l234.667 234.667c4.164 4.165 4.164 10.917 0 15.083L135.685 487.544a10.663 10.663 0 01-7.552 3.136z">
                </path>
            </symbol>
        </defs>
    </svg>

    <svg style="display:none">
        <defs>
            <symbol id="icon-search" class="icon icon-search" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 192.904 192.904">
                <path
                    d="M190.707 180.101l-47.078-47.077c11.702-14.072 18.752-32.142 18.752-51.831C162.381 36.423 125.959 0 81.191 0 36.422 0 0 36.423 0 81.193c0 44.767 36.422 81.187 81.191 81.187 19.688 0 37.759-7.049 51.831-18.751l47.079 47.078a7.474 7.474 0 005.303 2.197 7.498 7.498 0 005.303-12.803zM15 81.193C15 44.694 44.693 15 81.191 15c36.497 0 66.189 29.694 66.189 66.193 0 36.496-29.692 66.187-66.189 66.187C44.693 147.38 15 117.689 15 81.193z">
                </path>
            </symbol>
        </defs>
    </svg>

    <!--   

-->
    <style>
        .btn-main.btn-icon {
            color: #d82e4d;
            /* Màu chữ ban đầu */
            border: 2px solid #d82e4d;
            /* Màu viền */
            padding: 10px 20px;
            /* Khoảng cách bên trong viền */
            border-radius: 5px;
            /* Bo góc viền */
            background-color: #f8f9fa;
            /* Màu nền ban đầu */
            text-decoration: none;
            /* Xóa gạch chân */
            display: inline-flex;
            /* Hiển thị inline-flex để căn chỉnh biểu tượng */
            align-items: center;
            /* Căn chỉnh biểu tượng và chữ */
            transition: background-color 0.3s, color 0.3s;
            /* Hiệu ứng chuyển đổi mượt mà */
        }

        .btn-main.btn-icon:hover {
            background-color: #d82e4d;
            /* Màu nền khi hover */
            color: #fff;
            /* Màu chữ khi hover */
        }

        .btn-main.btn-icon svg {
            margin-left: 5px;
            /* Khoảng cách giữa chữ và biểu tượng */
        }
    </style>
    <!-- Thêm liên kết tới jQuery từ CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <!--link footer-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" media="all">
    <link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/fonts.css?1692084315105"
        media="all">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    {{-- --}}

    <link rel="icon" href="{{asset('Giaodien/100/426/076/themes/917889/assets/favicon.png?1692086228721')}}"
        type="image/x-icon" />
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://bizweb.dktcdn.net">
    <link rel="dns-prefetch" href="https://ega-cosmetic.mysapo.net">
    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/main.scss.css?1692086228721')}}">
    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/index.scss.css?1692086228721')}}">
    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/bootstrap-lite.css?1692086228721')}}">


    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721')}}">
    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721')}}">
    <link rel="preload" as='style' type="text/css"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721')}}">

    <link rel="stylesheet"
        href="{{asset('Giaodien/100/426/076/themes/917889/assets/bootstrap-lite.css?1692086228721')}}">

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

    <link href="{{asset('Giaodien/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721')}}"
        rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('Giaodien/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721')}}"
        rel="stylesheet" type="text/css" media="all" />


    <script src="dist/js/stats.min.js?v=96f2ff2"></script>
    <link href="Giaodien/100/426/076/themes/917889/assets/appcombo.css?1692086228721" rel="stylesheet" type="text/css"
        media="all" />


    {{-- Thùng rác trong cart --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        .section_slider {
            margin-top: 20px;
            position: relative;
        }

        .carousel-item img {
            height: 400px;
            /* Điều chỉnh chiều cao của hình ảnh */
            object-fit: cover;
            /* Đảm bảo hình ảnh không bị méo khi co dãn */
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: auto;
            /* Để các nút điều hướng không quá rộng */
            background-color: rgba(0, 0, 0, 0.3);
            /* Màu nền của các nút điều hướng */
            border-radius: 50%;
            /* Làm tròn các nút điều hướng */
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(100%);
            /* Đảo ngược màu sắc của biểu tượng điều hướng */
        }

        .carousel-control-prev {
            left: 10px;
            /* Vị trí trái của nút điều hướng prev */
        }

        .carousel-control-next {
            right: 10px;
            /* Vị trí phải của nút điều hướng next */
        }

        /* Xóa khoảng cách giữa các carousel item */
        .carousel-item {
            margin-right: 0;
        }

        a {
            text-decoration: none;
        }
    </style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    {{-- COPY --}}



    <link rel="icon" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/favicon.png?1692086228721"
        type="image/x-icon">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link rel="dns-prefetch" href="https://bizweb.dktcdn.net">
    <link rel="dns-prefetch" href="https://ega-cosmetic.mysapo.net">
    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/main.scss.css?1692086228721">
    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/index.scss.css?1692086228721">
    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-lite.css?1692086228721">


    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721">
    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721">
    <link rel="preload" as="style" type="text/css"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721">



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

    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/index.scss.css?1692086228721" rel="stylesheet"
        type="text/css" media="all">
    <link rel="preload" as="script" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721">
    <script id="facebook-jssdk" src="https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js"></script>
    <script type="text/javascript" async=""
        src="//newproductreviews.sapoapps.vn/assets/js/productreviews.min.js?store=ega-cosmetic.mysapo.net">
    </script>
    <script type="text/javascript" async=""
        src="https://buyx-gety.sapoapps.vn/assets/script.v2.js?store=ega-cosmetic.mysapo.net"></script>
    <script type="text/javascript" async=""
        src="https://combo.sapoapps.vn/assets/script.js?store=ega-cosmetic.mysapo.net"></script>
    <script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721" type="text/javascript">
    </script>
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721" rel="stylesheet"
        type="text/css" media="all">

    <script src="/dist/js/stats.min.js?v=96f2ff2"></script>
    <script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>



    <!--
        Theme Information
        --------------------------------------
        Theme ID: EGA Cosmetic
        Version: 1.4.0_20230815
        Company: EGANY
        changelog: //bizweb.dktcdn.net/100/426/076/themes/917889/assets/ega-changelog.js?1692086228721
        ---------------------------------------
    -->
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/appcombo.css?1692086228721" rel="stylesheet"
        type="text/css" media="all">
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <link rel="stylesheet" href="https://buyx-gety.sapoapps.vn/assets/buyxgety.css">
    <script type="text/javascript" src="https://newproductreviews.sapoapps.vn/assets/js/lang/vi.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
        media="all">
    <link rel="stylesheet" type="text/css"
        href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
    <script src="https://mixcdn.egany.com/themes/smartsearch-builtin/smartsearch-v2.min.js"></script>
    <link rel="prefetch" href="/collections/all">
    <style>
        *,
        :before,
        :after {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / .5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        ::backdrop {
            --tw-border-spacing-x: 0;
            --tw-border-spacing-y: 0;
            --tw-translate-x: 0;
            --tw-translate-y: 0;
            --tw-rotate: 0;
            --tw-skew-x: 0;
            --tw-skew-y: 0;
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            --tw-pan-x: ;
            --tw-pan-y: ;
            --tw-pinch-zoom: ;
            --tw-scroll-snap-strictness: proximity;
            --tw-ordinal: ;
            --tw-slashed-zero: ;
            --tw-numeric-figure: ;
            --tw-numeric-spacing: ;
            --tw-numeric-fraction: ;
            --tw-ring-inset: ;
            --tw-ring-offset-width: 0px;
            --tw-ring-offset-color: #fff;
            --tw-ring-color: rgb(59 130 246 / .5);
            --tw-ring-offset-shadow: 0 0 #0000;
            --tw-ring-shadow: 0 0 #0000;
            --tw-shadow: 0 0 #0000;
            --tw-shadow-colored: 0 0 #0000;
            --tw-blur: ;
            --tw-brightness: ;
            --tw-contrast: ;
            --tw-grayscale: ;
            --tw-hue-rotate: ;
            --tw-invert: ;
            --tw-saturate: ;
            --tw-sepia: ;
            --tw-drop-shadow: ;
            --tw-backdrop-blur: ;
            --tw-backdrop-brightness: ;
            --tw-backdrop-contrast: ;
            --tw-backdrop-grayscale: ;
            --tw-backdrop-hue-rotate: ;
            --tw-backdrop-invert: ;
            --tw-backdrop-opacity: ;
            --tw-backdrop-saturate: ;
            --tw-backdrop-sepia:
        }

        .tw-invisible {
            visibility: hidden
        }

        .tw-fixed {
            position: fixed
        }

        .tw-relative {
            position: relative
        }

        .tw-left-0 {
            left: 0
        }

        .tw-right-0 {
            right: 0
        }

        .tw-top-0 {
            top: 0
        }

        .-tw-z-10 {
            z-index: -10
        }

        .tw-z-\[1000\] {
            z-index: 1000
        }

        .tw-z-\[9999\] {
            z-index: 9999
        }

        .tw-mb-0 {
            margin-bottom: 0
        }

        .tw-ml-\[1px\] {
            margin-left: 1px
        }

        .tw-ml-auto {
            margin-left: auto
        }

        .tw-mr-1 {
            margin-right: .25rem
        }

        .tw-mr-1\.5 {
            margin-right: .375rem
        }

        .tw-mt-1 {
            margin-top: .25rem
        }

        .tw-mt-1\.5 {
            margin-top: .375rem
        }

        .tw-mt-3 {
            margin-top: .75rem
        }

        .tw-block {
            display: block
        }

        .tw-inline-block {
            display: inline-block
        }

        .tw-flex {
            display: flex
        }

        .tw-grid {
            display: grid
        }

        .tw-hidden {
            display: none
        }

        .tw-h-1 {
            height: .25rem
        }

        .tw-h-5 {
            height: 1.25rem
        }

        .tw-h-7 {
            height: 1.75rem
        }

        .tw-h-screen {
            height: 100vh
        }

        .tw-max-h-96 {
            max-height: 24rem
        }

        .tw-w-1 {
            width: .25rem
        }

        .tw-w-5 {
            width: 1.25rem
        }

        .tw-w-7 {
            width: 1.75rem
        }

        .tw-w-96 {
            width: 24rem
        }

        .tw-w-\[calc\(100\%-6px\)\] {
            width: calc(100% - 6px)
        }

        .tw-w-full {
            width: 100%
        }

        .tw-max-w-\[calc\(100\%-30px\)\] {
            max-width: calc(100% - 30px)
        }

        .tw-max-w-full {
            max-width: 100%
        }

        .tw-flex-1 {
            flex: 1 1 0%
        }

        .tw-flex-\[0_0_70px\] {
            flex: 0 0 70px
        }

        @keyframes tw-spin {
            to {
                transform: rotate(360deg)
            }
        }

        .tw-animate-spin {
            animation: tw-spin 1s linear infinite
        }

        .tw-cursor-pointer {
            cursor: pointer
        }

        .tw-grid-cols-\[repeat\(auto-fit\,minmax\(100px\,50\%\)\)\] {
            grid-template-columns: repeat(auto-fit, minmax(100px, 50%))
        }

        .tw-flex-col {
            flex-direction: column
        }

        .tw-items-center {
            align-items: center
        }

        .tw-justify-between {
            justify-content: space-between
        }

        .tw-justify-around {
            justify-content: space-around
        }

        .tw-space-x-1>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(.25rem * var(--tw-space-x-reverse));
            margin-left: calc(.25rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .tw-space-x-2>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(.5rem * var(--tw-space-x-reverse));
            margin-left: calc(.5rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .tw-space-x-2\.5>:not([hidden])~:not([hidden]) {
            --tw-space-x-reverse: 0;
            margin-right: calc(.625rem * var(--tw-space-x-reverse));
            margin-left: calc(.625rem * calc(1 - var(--tw-space-x-reverse)))
        }

        .tw-overflow-hidden {
            overflow: hidden
        }

        .tw-overflow-y-auto {
            overflow-y: auto
        }

        .tw-rounded-3xl {
            border-radius: 1.5rem
        }

        .tw-rounded-lg {
            border-radius: .5rem
        }

        .tw-rounded-sm {
            border-radius: .125rem
        }

        .tw-border {
            border-width: 1px
        }

        .tw-border-x-0 {
            border-left-width: 0px;
            border-right-width: 0px
        }

        .tw-border-b {
            border-bottom-width: 1px
        }

        .tw-border-b-0 {
            border-bottom-width: 0px
        }

        .tw-border-r {
            border-right-width: 1px
        }

        .tw-border-t {
            border-top-width: 1px
        }

        .tw-border-t-0 {
            border-top-width: 0px
        }

        .tw-border-solid {
            border-style: solid
        }

        .tw-border-slate-200 {
            --tw-border-opacity: 1;
            border-color: rgb(226 232 240 / var(--tw-border-opacity))
        }

        .tw-border-slate-700 {
            --tw-border-opacity: 1;
            border-color: rgb(51 65 85 / var(--tw-border-opacity))
        }

        .tw-border-transparent {
            border-color: transparent
        }

        .tw-border-b-slate-200 {
            --tw-border-opacity: 1;
            border-bottom-color: rgb(226 232 240 / var(--tw-border-opacity))
        }

        .tw-border-r-slate-200 {
            --tw-border-opacity: 1;
            border-right-color: rgb(226 232 240 / var(--tw-border-opacity))
        }

        .tw-bg-black\/40 {
            background-color: #0006
        }

        .tw-bg-slate-700 {
            --tw-bg-opacity: 1;
            background-color: rgb(51 65 85 / var(--tw-bg-opacity))
        }

        .tw-bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .tw-p-1 {
            padding: .25rem
        }

        .tw-p-2 {
            padding: .5rem
        }

        .tw-px-2 {
            padding-left: .5rem;
            padding-right: .5rem
        }

        .tw-px-2\.5 {
            padding-left: .625rem;
            padding-right: .625rem
        }

        .tw-px-4 {
            padding-left: 1rem;
            padding-right: 1rem
        }

        .tw-py-1 {
            padding-top: .25rem;
            padding-bottom: .25rem
        }

        .tw-py-1\.5 {
            padding-top: .375rem;
            padding-bottom: .375rem
        }

        .tw-py-2 {
            padding-top: .5rem;
            padding-bottom: .5rem
        }

        .tw-py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .tw-text-center {
            text-align: center
        }

        .tw-text-base {
            font-size: 1rem;
            line-height: 1.5rem
        }

        .tw-text-sm {
            font-size: .875rem;
            line-height: 1.25rem
        }

        .tw-font-medium {
            font-weight: 500
        }

        .tw-leading-4 {
            line-height: 1rem
        }

        .tw-leading-none {
            line-height: 1
        }

        .tw-text-\[var\(--color-keyword\)\] {
            color: var(--color-keyword)
        }

        .tw-text-slate-600 {
            --tw-text-opacity: 1;
            color: rgb(71 85 105 / var(--tw-text-opacity))
        }

        .tw-no-underline {
            text-decoration-line: none
        }

        .tw-opacity-0 {
            opacity: 0
        }

        .tw-opacity-25 {
            opacity: .25
        }

        .tw-opacity-75 {
            opacity: .75
        }

        .tw-shadow-\[0_0_5px_rgba\(0\,0\,0\,\.25\)\] {
            --tw-shadow: 0 0 5px rgba(0, 0, 0, .25);
            --tw-shadow-colored: 0 0 5px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .ega-sm-wrapper,
        .ega-sm-wrapper * {
            box-sizing: border-box
        }

        .ega-sm-wrapper {
            background-color: var(--wrapper-bg);
            width: var(--wrapper-width)
        }

        .ega-sm-results {
            max-height: var(--wrapper-height)
        }

        .ega-sm-item:hover,
        .ega-sm-bottom:hover {
            background-color: var(--item-hover-bg)
        }

        .ega-sm-heading {
            color: var(--heading-color)
        }

        .ega-sm-item-title {
            color: var(--item-title-color)
        }

        .ega-sm-item-price {
            color: var(--price-color)
        }

        .ega-sm-item-compare-price {
            color: var(--compare-price-color)
        }

        .ega-sm-bottom>a {
            color: var(--view-all-color)
        }

        .ega-sm-loading {
            color: var(--loading-color)
        }

        .ega-sm-nav {
            background-color: var(--nav-bg);
            color: var(--nav-color)
        }

        .ega-sm-nav.ega-sm-is-active {
            background-color: var(--nav-bg-active);
            color: var(--nav-color-active)
        }

        .before\:tw-absolute:before {
            content: var(--tw-content);
            position: absolute
        }

        .before\:-tw-left-1:before {
            content: var(--tw-content);
            left: -.25rem
        }

        .before\:-tw-left-1\.5:before {
            content: var(--tw-content);
            left: -.375rem
        }

        .before\:tw-left-1:before {
            content: var(--tw-content);
            left: .25rem
        }

        .before\:tw-left-1\.5:before {
            content: var(--tw-content);
            left: .375rem
        }

        .before\:tw-top-0:before {
            content: var(--tw-content);
            top: 0
        }

        .before\:tw-h-1:before {
            content: var(--tw-content);
            height: .25rem
        }

        .before\:tw-w-1:before {
            content: var(--tw-content);
            width: .25rem
        }

        .before\:tw-bg-slate-700:before {
            content: var(--tw-content);
            --tw-bg-opacity: 1;
            background-color: rgb(51 65 85 / var(--tw-bg-opacity))
        }

        .before\:tw-content-\[\"\"\]:before {
            --tw-content: "";
            content: var(--tw-content)
        }

        .after\:tw-absolute:after {
            content: var(--tw-content);
            position: absolute
        }

        .after\:-tw-right-3:after {
            content: var(--tw-content);
            right: -.75rem
        }

        .after\:tw-top-0:after {
            content: var(--tw-content);
            top: 0
        }

        .after\:tw-h-1:after {
            content: var(--tw-content);
            height: .25rem
        }

        .after\:tw-w-1:after {
            content: var(--tw-content);
            width: .25rem
        }

        .after\:tw-bg-slate-700:after {
            content: var(--tw-content);
            --tw-bg-opacity: 1;
            background-color: rgb(51 65 85 / var(--tw-bg-opacity))
        }

        .after\:tw-content-\[\"\"\]:after {
            --tw-content: "";
            content: var(--tw-content)
        }

        @media (min-width: 640px) {
            .sm\:tw-block {
                display: block
            }
        }
    </style>
    <style type="text/css"
        data-fbcssmodules="css:fb.css.base css:fb.css.dialog css:fb.css.iframewidget css:fb.css.customer_chat_plugin_iframe">
        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_hidden {
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_reposition {
            overflow: hidden;
            position: relative
        }

        .fb_invisible {
            display: none
        }

        .fb_reset {
            background: none;
            border: 0;
            border-spacing: 0;
            color: #000;
            cursor: auto;
            direction: ltr;
            font-family: 'lucida grande', tahoma, verdana, arial, sans-serif;
            font-size: 11px;
            font-style: normal;
            font-variant: normal;
            font-weight: normal;
            letter-spacing: normal;
            line-height: 1;
            margin: 0;
            overflow: visible;
            padding: 0;
            text-align: left;
            text-decoration: none;
            text-indent: 0;
            text-shadow: none;
            text-transform: none;
            visibility: visible;
            white-space: normal;
            word-spacing: normal
        }

        .fb_reset>div {
            overflow: hidden
        }

        @keyframes fb_transform {
            from {
                opacity: 0;
                transform: scale(.95)
            }

            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .fb_animate {
            animation: fb_transform .3s forwards
        }

        .fb_dialog {
            background: rgba(82, 82, 82, .7);
            position: absolute;
            top: -10000px;
            z-index: 10001
        }

        .fb_dialog_advanced {
            border-radius: 8px;
            padding: 10px
        }

        .fb_dialog_content {
            background: #fff;
            color: #373737
        }

        .fb_dialog_close_icon {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 0 transparent;
            cursor: pointer;
            display: block;
            height: 15px;
            position: absolute;
            right: 18px;
            top: 17px;
            width: 15px
        }

        .fb_dialog_mobile .fb_dialog_close_icon {
            left: 5px;
            right: auto;
            top: 5px
        }

        .fb_dialog_padding {
            background-color: transparent;
            position: absolute;
            width: 1px;
            z-index: -1
        }

        .fb_dialog_close_icon:hover {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -15px transparent
        }

        .fb_dialog_close_icon:active {
            background: url(https://connect.facebook.net/rsrc.php/v3/yq/r/IE9JII6Z1Ys.png) no-repeat scroll 0 -30px transparent
        }

        .fb_dialog_iframe {
            line-height: 0
        }

        .fb_dialog_content .dialog_title {
            background: #6d84b4;
            border: 1px solid #365899;
            color: #fff;
            font-size: 14px;
            font-weight: bold;
            margin: 0
        }

        .fb_dialog_content .dialog_title>span {
            background: url(https://connect.facebook.net/rsrc.php/v3/yd/r/Cou7n-nqK52.gif) no-repeat 5px 50%;
            float: left;
            padding: 5px 0 7px 26px
        }

        body.fb_hidden {
            height: 100%;
            left: 0;
            margin: 0;
            overflow: visible;
            position: absolute;
            top: -10000px;
            transform: none;
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading {
            background: url(https://connect.facebook.net/rsrc.php/v3/ya/r/3rhSv5V8j3o.gif) white no-repeat 50% 50%;
            min-height: 100%;
            min-width: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 10001
        }

        .fb_dialog.fb_dialog_mobile.loading.centered {
            background: none;
            height: auto;
            min-height: initial;
            min-width: initial;
            width: auto
        }

        .fb_dialog.fb_dialog_mobile.loading.centered #fb_dialog_loader_spinner {
            width: 100%
        }

        .fb_dialog.fb_dialog_mobile.loading.centered .fb_dialog_content {
            background: none
        }

        .loading.centered #fb_dialog_loader_close {
            clear: both;
            color: #fff;
            display: block;
            font-size: 18px;
            padding-top: 20px
        }

        #fb-root #fb_dialog_ipad_overlay {
            background: rgba(0, 0, 0, .4);
            bottom: 0;
            left: 0;
            min-height: 100%;
            position: absolute;
            right: 0;
            top: 0;
            width: 100%;
            z-index: 10000
        }

        #fb-root #fb_dialog_ipad_overlay.hidden {
            display: none
        }

        .fb_dialog.fb_dialog_mobile.loading iframe {
            visibility: hidden
        }

        .fb_dialog_mobile .fb_dialog_iframe {
            position: sticky;
            top: 0
        }

        .fb_dialog_content .dialog_header {
            background: linear-gradient(from(#738aba), to(#2c4987));
            border-bottom: 1px solid;
            border-color: #043b87;
            box-shadow: white 0 1px 1px -1px inset;
            color: #fff;
            font: bold 14px Helvetica, sans-serif;
            text-overflow: ellipsis;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0;
            vertical-align: middle;
            white-space: nowrap
        }

        .fb_dialog_content .dialog_header table {
            height: 43px;
            width: 100%
        }

        .fb_dialog_content .dialog_header td.header_left {
            font-size: 12px;
            padding-left: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .dialog_header td.header_right {
            font-size: 12px;
            padding-right: 5px;
            vertical-align: middle;
            width: 60px
        }

        .fb_dialog_content .touchable_button {
            background: linear-gradient(from(#4267B2), to(#2a4887));
            background-clip: padding-box;
            border: 1px solid #29487d;
            border-radius: 3px;
            display: inline-block;
            line-height: 18px;
            margin-top: 3px;
            max-width: 85px;
            padding: 4px 12px;
            position: relative
        }

        .fb_dialog_content .dialog_header .touchable_button input {
            background: none;
            border: none;
            color: #fff;
            font: bold 12px Helvetica, sans-serif;
            margin: 2px -12px;
            padding: 2px 6px 3px 6px;
            text-shadow: rgba(0, 30, 84, .296875) 0 -1px 0
        }

        .fb_dialog_content .dialog_header .header_center {
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            line-height: 18px;
            text-align: center;
            vertical-align: middle
        }

        .fb_dialog_content .dialog_content {
            background: url(https://connect.facebook.net/rsrc.php/v3/y9/r/jKEcVPZFk-2.gif) no-repeat 50% 50%;
            border: 1px solid #4a4a4a;
            border-bottom: 0;
            border-top: 0;
            height: 150px
        }

        .fb_dialog_content .dialog_footer {
            background: #f5f6f7;
            border: 1px solid #4a4a4a;
            border-top-color: #ccc;
            height: 40px
        }

        #fb_dialog_loader_close {
            float: left
        }

        .fb_dialog.fb_dialog_mobile .fb_dialog_close_icon {
            visibility: hidden
        }

        #fb_dialog_loader_spinner {
            animation: rotateSpinner 1.2s linear infinite;
            background-color: transparent;
            background-image: url(https://connect.facebook.net/rsrc.php/v3/yD/r/t-wz8gw1xG1.png);
            background-position: 50% 50%;
            background-repeat: no-repeat;
            height: 24px;
            width: 24px
        }

        @keyframes rotateSpinner {
            0% {
                transform: rotate(0deg)
            }

            100% {
                transform: rotate(360deg)
            }
        }

        .fb_iframe_widget {
            display: inline-block;
            position: relative
        }

        .fb_iframe_widget span {
            display: inline-block;
            position: relative;
            text-align: justify
        }

        .fb_iframe_widget iframe {
            position: absolute
        }

        .fb_iframe_widget_fluid_desktop,
        .fb_iframe_widget_fluid_desktop span,
        .fb_iframe_widget_fluid_desktop iframe {
            max-width: 100%
        }

        .fb_iframe_widget_fluid_desktop iframe {
            min-width: 220px;
            position: relative
        }

        .fb_iframe_widget_lift {
            z-index: 1
        }

        .fb_iframe_widget_fluid {
            display: inline
        }

        .fb_iframe_widget_fluid span {
            width: 100%
        }

        .fb_mpn_mobile_landing_page_slide_out {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_out_from_left {
            animation-duration: 200ms;
            animation-name: fb_mpn_landing_page_slide_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_landing_page_slide_up {
            animation-duration: 500ms;
            animation-name: fb_mpn_landing_page_slide_up;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_in {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_in;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out {
            animation-duration: 300ms;
            animation-name: fb_mpn_bounce_out;
            transition-timing-function: ease-in
        }

        .fb_mpn_mobile_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_mpn_fade_out;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_in_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_in_from_left;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_v2 {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_v2;
            transition-timing-function: ease-in
        }

        .fb_customer_chat_bounce_out_from_left {
            animation-duration: 300ms;
            animation-name: fb_bounce_out_from_left;
            transition-timing-function: ease-in
        }

        .fb_invisible_flow {
            display: inherit;
            height: 0;
            overflow-x: hidden;
            width: 0
        }

        @keyframes fb_mpn_landing_page_slide_out {
            0% {
                margin: 0 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                margin: 0 24px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_out_from_left {
            0% {
                left: 12px;
                width: 100% - 24px
            }

            60% {
                border-radius: 18px
            }

            100% {
                border-radius: 50%;
                left: 12px;
                width: 60px
            }
        }

        @keyframes fb_mpn_landing_page_slide_up {
            0% {
                bottom: 0;
                opacity: 0
            }

            100% {
                bottom: 24px;
                opacity: 1
            }
        }

        @keyframes fb_mpn_bounce_in {
            0% {
                opacity: .5;
                top: 100%
            }

            100% {
                opacity: 1;
                top: 0
            }
        }

        @keyframes fb_mpn_fade_out {
            0% {
                bottom: 30px;
                opacity: 1
            }

            100% {
                bottom: 0;
                opacity: 0
            }
        }

        @keyframes fb_mpn_bounce_out {
            0% {
                opacity: 1;
                top: 0
            }

            100% {
                opacity: .5;
                top: 100%
            }
        }

        @keyframes fb_bounce_in_v2 {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom right
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_in_from_left {
            0% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }

            50% {
                transform: scale(1.03, 1.03);
                transform-origin: bottom left
            }

            100% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }
        }

        @keyframes fb_bounce_out_v2 {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom right
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom right
            }
        }

        @keyframes fb_bounce_out_from_left {
            0% {
                opacity: 1;
                transform: scale(1, 1);
                transform-origin: bottom left
            }

            100% {
                opacity: 0;
                transform: scale(0, 0);
                transform-origin: bottom left
            }
        }

        @keyframes slideInFromBottom {
            0% {
                opacity: .1;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        @keyframes slideInFromBottomDelay {
            0% {
                opacity: 0;
                transform: translateY(100%)
            }

            97% {
                opacity: 0;
                transform: translateY(100%)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }
    </style>
    <script type="text/javascript" src="https://newproductreviews.sapoapps.vn/assets/js/lang/vi.min.js"></script>


</head>

<body>
    <header class="header header_menu">
        <div class="mid-header wid_100 d-flex align-items-center">
            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-3 header-right d-lg-none d-block">
                        <div class="toggle-nav btn menu-bar mr-4 ml-0 p-0  d-lg-none d-flex text-white">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                    </div>
                    <div class="col-6 col-xl-3 col-lg-3 header-left">

                        <a href="/" class="logo-wrapper ">
                            <img class="img-fluid"
                                src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/logo.png?1692086228721"
                                alt="logo EGA Cosmetic" width="248" height="53">
                        </a>



                        <header class="header header_sticky">

                            <div class="mid-header wid_100 d-flex align-items-center">
                                <div class="container">

                                    <div class="row align-items-center">
                                        <div class="col-2 col-md-3 header-left d-lg-none d-block py-1">
                                            <div
                                                class="toggle-nav btn menu-bar mr-4 ml-0 p-0  d-lg-none d-flex text-white">
                                                <span class="bar"></span>
                                                <span class="bar"></span>
                                                <span class="bar"></span>
                                            </div>
                                        </div>
                                        <div
                                            class="col-4 col-xl-3 col-lg-3  header-left d-none d-lg-flex align-items-center h-100">

                                            <div class="toogle-nav-wrapper w-100 ">
                                                <div class=" d-flex align-items-center"
                                                    style="height: 52px; font-size: 1rem; font-weight: 500">
                                                    <div class="icon-bar btn menu-bar mr-3 ml-0 p-0 d-inline-flex">
                                                        <span class="bar"></span>
                                                        <span class="bar"></span>
                                                        <span class="bar"></span>
                                                    </div>
                                                    Danh mục sản phẩm
                                                </div>

                                                <div class="navigation-wrapper">
                                                </div>

                                            </div>

                                        </div>
                                        <div class=" col-8 col-md-6 col-lg-4 col-xl-4 header-center py-1"
                                            id="search-header">
                                            <form action="/search" method="get"
                                                class="input-group search-bar custom-input-group " role="search">
                                                <input type="text" name="query" value="" autocomplete="off"
                                                    class="input-group-field auto-search form-control " required=""
                                                    data-placeholder="Tìm theo tên sản phẩm...; Tìm theo thương hiệu...;">
                                                <input type="hidden" name="type" value="product">
                                                <span class="input-group-btn btn-action">
                                                    <button type="submit" aria-label="search"
                                                        class="btn text-white icon-fallback-text h-100">
                                                        <svg class="icon">
                                                            <use xlink:href="#icon-search"></use>
                                                        </svg> </button>
                                                </span>

                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </header>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-12 header-center" id="search-header">

                        <form id="search-form" method="get" class="input-group search-bar custom-input-group "
                            role="search">
                            <input type="text" id="query" name="query" value="" autocomplete="off"
                                class="input-group-field auto-search form-control" required=""
                                data-placeholder="Tìm theo tên sản phẩm...; Tìm theo thương hiệu...;"
                                placeholder="Tìm kiếm">
                            <input type="hidden" name="type" value="product">
                            <span class="input-group-btn btn-action">
                                <button type="submit" aria-label="search"
                                    class="btn text-white icon-fallback-text h-100">
                                    <svg class="icon">
                                        <use xlink:href="#icon-search"></use>
                                    </svg>
                                </button>
                            </span>
                        </form>

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('search-form').addEventListener('submit', function(e) {
                                e.preventDefault(); 
                                var query = document.getElementById('query').value;
                                var url = '{{ route("site.product.search", ":query") }}';
                                url = url.replace(':query', encodeURIComponent(query));
                                window.location.href = url;
                            });
                        });
                        </script>
                        {{-- <div class="search-dropdow">
                            <ul class="search__list pl-0 d-flex list-unstyled mb-0 flex-wrap">
                                <li class="mr-2">
                                    <a id="filter-search-kem-chong-nang"
                                        href="/search?q=tags:(Kem+ch%E1%BB%91ng+n%E1%BA%AFng)&amp;type=product">Kem
                                        chống nắng</a>
                                </li>
                                <li class="mr-2">
                                    <a id="filter-search-son-moi"
                                        href="/search?q=tags:(+Son+m%C3%B4i)&amp;type=product"> Son môi</a>
                                </li>
                                <li class="mr-2">
                                    <a id="filter-search-bong-tay-trang"
                                        href="/search?q=tags:(+B%C3%B4ng+t%E1%BA%A9y+trang)&amp;type=product"> Bông tẩy
                                        trang</a>
                                </li>
                                <li class="mr-2">
                                    <a id="filter-search-serum" href="/search?q=tags:(+Serum)&amp;type=product">
                                        Serum</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-3 col-xl-5 col-lg-5 ">
                        <ul class="header-right mb-0 float-right list-unstyled  d-flex align-items-center">
                            <li class="media d-lg-flex d-none hotline ">
                                <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/phone_icon.png?1692086228721"
                                    width="32" height="32" class="mr-3 align-self-center" alt="phone_icon">

                                <div class="media-body d-md-flex flex-column d-none ">
                                    <span>Hỗ trợ khách hàng</span>
                                    <a class="font-weight-bold d-block" href="tel:19006750" title="19006750">
                                        19006750
                                    </a>
                                </div>
                            </li>
                            <li class="ml-4 mr-4 mr-md-3 ml-md-3 media d-lg-flex d-none ">
                                <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/account_icon.png?1692086228721"
                                    width="32" height="32" alt="account_icon" class="  mr-3 align-self-center">
                                <div class="media-body d-md-flex flex-column d-none ">
                                    @if(Auth::check())
                                    @php
                                    $user=Auth::user();
                                    @endphp
                                    <a rel="nofollow" href="{{ route('user.profile') }}" class="d-block"
                                        title="Tài khoản">
                                        {{ $user->name }}
                                    </a>
                                    <small>
                                        <a href="{{ route('website.logout') }}" title="Đăng xuất"
                                            class="font-weight: light">
                                            Đăng xuất
                                        </a> </small>
                                    @else

                                    <a href="{{ route('website.getlogin') }}" title="Đăng nhập"
                                        class="font-weight: light">
                                        Đăng nhập
                                    </a>
                                    <small>
                                        <a href="{{ route('website.register') }}" title="Đăng kí"
                                            class="font-weight: light">
                                            Đăng kí
                                        </a> </small>
                                    @endif

                                </div>
                            </li>
                            <li class="cartgroup  ml-0 mr-2 mr-md-0">
                                <div class="mini-cart text-xs-center">
                                    <a class="img_hover_cart" href="{{ route('site.cart.index') }}" title="Giỏ hàng">
                                        <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/cart_icon.png?1692086228721"
                                            width="22" height="22" alt="cart_icon">
                                        @php
                                        $count=count(session('carts',[]));
                                        @endphp
                                        <span class="mx-1 d-xl-block d-none"></span>
                                        <span class="count_item count_item_pr" id="showqty">{{ $count }}</span>
                                    </a>

                                </div>
                            </li>
                            <li class="ml-2 mr-2">
                                <div class="mini-cart text-xs-center">
                                    <a class="img_hover_cart d-flex align-items-center" href="{{ route('orders.index') }}" title="Xem đơn hàng">
                                        <span class="mx-2">Đơn hàng</span>
                                    </a>
                                </div>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer bg-white" style="--footer-overlay: #f6f6f6">
        <div class="mid-footer">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-xl-4 footer-click footer-1">

                        <h4 class="title-menu clicked">
                            Về chúng tôi
                        </h4>

                        <a href="/" class="logo-wrapper mb-3 d-block ">
                            <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/logo-footer.png?1692086228721"
                                alt="logo EGA Cosmetic" width="150" height="32">
                        </a>

                        <p>
                            Cung cấp sản phẩm chất lượng từ các thương hiệu hàng đầu.
                        </p>
                        <div class="single-contact">
                            <i class="fa fa-map-marker-alt"></i>
                            <div class="content">Địa chỉ:
                                <span>150/8 Nguyễn Duy Cung, Phường 12, Tp.HCM</span>

                            </div>
                        </div>
                        <div class="single-contact">
                            <i class="fa fa-mobile-alt"></i>
                            <div class="content">
                                Số điện thoại: <a class="link" title="19006750" href="tel:19006750">19006750</a>
                            </div>
                        </div>
                        <div class="single-contact">
                            <i class="fa fa-envelope"></i>
                            <div class="content">
                                Email: <a title="support@sapo.vn" class="link"
                                    href="mailto:support@sapo.vn">support@sapo.vn</a>
                            </div>
                        </div>
                        <div class="social-footer">

                            <ul class="follow_option d-flex flex-wrap align-items-center p-0 list-unstyled">

                                <li>
                                    <a class="facebook link" href="https://bikipweb.site" target="_blank"
                                        title="Theo dõi Facebook EGA Cosmetic">
                                        <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/facebook.png?1692086228721"
                                            width="24" height="24" alt="facebook">

                                    </a>
                                </li>


                                <li>
                                    <a class="zalo link" href="https://zalo.me/834141234794359440" target="_blank"
                                        title="Theo dõi zalo EGA Cosmetic">
                                        <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/zalo.png?1692086228721"
                                            width="24" height="24" alt="zalo">

                                    </a>
                                </li>


                                <li>
                                    <a class="instgram link" href="#" target="_blank"
                                        title="Theo dõi instgram EGA Cosmetic">
                                        <img src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/instagram.png?1692086228721"
                                            width="24" height="24" alt="instgram">
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    {{-- Footer động --}}
                    <x-footer-menu />
                    <div class="col-xs-12 col-md-6 col-xl-4 footer-click">
                        <h4 class="title-menu">
                            Đăng ký nhận tin
                        </h4>
                        <div class="form_register ">
                            <form id="mc-form" class="newsletter-form custom-input-group mb-3" data-toggle="validator"
                                novalidate="true">
                                <input class="form-control input-group-field  " aria-label="Địa chỉ Email" type="email"
                                    placeholder="Nhập địa chỉ email" name="EMAIL" required="" autocomplete="off">
                                <div class="input-group-btn btn-action">
                                    <button class="h-100 btn text-white button_subscribe subscribe" type="submit"
                                        aria-label="Đăng ký nhận tin" name="subscribe">Đăng ký</button>
                                </div>
                            </form>
                            <div class="mailchimp-alerts ">
                                <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                                <div class="mailchimp-success mb-2"></div><!-- mailchimp-success end -->
                                <div class="mailchimp-error mb-2"></div><!-- mailchimp-error end -->
                            </div>
                        </div>


                        <span class="title-menu">
                            Phương thức thanh toán
                        </span>
                        <div class="product-trustbadge my-3">
                            <a href="/collections/all" target="_blank" title="Phương thức thanh toán">
                                <img class=" img-fluid"
                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/footer_trustbadge.jpg?1692086228721"
                                    alt="Phương thức thanh toán" width="246" height="53">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-footer-bottom copyright clearfix py-2">
            <div class="container">
                <div class="row">
                    <div id="copyright" class=" col-xl-4 col-lg-12 col-md-12 col-xs-12 fot_copyright">



                        <span class="wsp">
                            © Bản quyền thuộc về <a href="https://egany.com" rel="nofollow" target="_blank">EGANY</a>
                            | Cung cấp bởi <a href="javascript:;">Sapo</a>
                        </span>
                    </div>
                </div>
                <div class="addThis_listSharing ">

                    <a href="#" id="back-to-top"
                        class="backtop back-to-top d-flex align-items-center justify-content-center show"
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
                            <a class="addThis_item--icon" href="https://zalo.me/834141234794359440" target="_blank"
                                rel="nofollow">
                                <img class="img-fluid"
                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-zalo.svg?1692086228721"
                                    alt="Gọi ngay cho chúng tôi" width="44" height="44">
                                <span class="tooltip-text">Chat với chúng tôi qua Zalo</span>
                            </a>
                        </li>

                    </ul>
                </div>

            </div>
        </div>

    </footer>
    @yield('footer')
</body>

</html>
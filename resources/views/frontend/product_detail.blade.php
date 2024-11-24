@extends('layouts.site')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    

    <!-- subheader == mobile nav -->
    <div class="subheader ">
        <div class="container ">
            <x-menu-list-cate />
            <x-main-menu />
        </div>
    </div>
    <section class="bread-crumb mb-3">
        <span class="crumb-border"></span>
        <div class="container ">
            <div class="row">
                <div class="col-12 a-left">
                    <ul class="breadcrumb m-0 px-0">
                        <li class="home">
                            <a href="{{ route('site.home') }}" class="link"><span>Trang chủ</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                            <a href="{{ route('site.product.index') }}" class="link"><span>Tất cả sản phẩm</span></a>
                            <span class="mr_lr">&nbsp;/&nbsp;</span>
                        </li>
                        <li><strong><span>{{ $product->name }}</span></strong></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- End Product Schema -->
    <section class="section mt-0 mb-xl-5 mb-0">
        <div class="container card py-3">
            <div class="section wrap-padding-15 wp_product_main m-0">
                <div class="details-product  ">
                    <div class="row ">

                        <div
                            class="product-detail-left product-images col-xs-12 col-sm-12 col-md-8 
								mx-auto  col-xl-4   col-lg-6 ">
                            <div class=" pb-3 pt-0  col_large_full large-image">



                                <div id="gallery_1" class="slick-initialized slick-slider">

                                    <div aria-live="polite" class="slick-list draggable">
                                        <div class="slick-track"
                                            style="opacity: 1; width: 473px; transform: translate3d(0px, 0px, 0px);"
                                            role="listbox">
                                            <a class="d-block pos-relative embed-responsive embed-responsive-1by1 slick-slide slick-current slick-active"
                                                data-src="//bizweb.dktcdn.net/thumb/1024x1024/100/426/076/products/combo-dau-goi-va-dau-xa-tsubaki-sach-dau-mat-lanh-490ml.jpg?v=1631849168343"
                                                href="//bizweb.dktcdn.net/thumb/1024x1024/100/426/076/products/combo-dau-goi-va-dau-xa-tsubaki-sach-dau-mat-lanh-490ml.jpg?v=1631849168343"
                                                data-rel="prettyPhoto[product-gallery]" data-slick-index="0"
                                                aria-hidden="false" style="width: 100%; height: 100%;" tabindex="-1"
                                                role="option" aria-describedby="slick-slide20">
                                                <img class="checkurl img-fluid"
                                                    style="--image-scale: 0.8;--img-left: 0;transform: translate(0,-50%) scale(var(--image-scale));transform-origin: left center; width: 100%; height: 100%;"
                                                    src="{{ asset('images/products/' . $product->image) }}" alt="">
                                            </a>
                                        </div>
                                    </div>


                                </div>



                                <div class="hidden">

                                </div>
                            </div>


                        </div>

                        <div class="col-xs-12 col-sm-12 px-lg-5  col-lg-6  details-pro">

                            <div class="">

                                <div class="">

                                    <span class="first_status "><span class="status_name">

                                            <a href="/collections/all?q=vendor.filter_key:(%22Tsubaki%22)&amp;page=1&amp;view=grid"
                                                target="_blank" class="product-vendor" title="Tsubaki">
                                                {{ $brand->name }}
                                            </a>
                                        </span>


                                    </span>
                                    <h1 class="title-product">{{ $product->name }}</h1>
                                    <form enctype="multipart/form-data" id="add-to-cart-form" action="/cart/add"
                                        method="post" class="form_background  margin-bottom-0">


                                        <div class="group-status">

                                            <span class="first_status status_2">
                                                Tình trạng:


                                                <span class="status_name availabel">
                                                    Còn hàng
                                                </span>


                                                <span class="line">&nbsp;&nbsp;|&nbsp;&nbsp;</span>

                                            </span>
                                            <span class="first_status  product_sku">
                                                Mã SKU:
                                                <span class="status_name product-sku" itemprop="sku"
                                                    content="Đang cập nhật">
                                                    Đang cập nhật

                                                </span>
                                            </span>
                                        </div>
                                        <div class="price-box">
                                            @if ($product->pricesale > 0)
                                                <span class="special-price">
                                                    <span
                                                        class="price product-price">{{ number_format($product->pricesale, 0, ',', '.') }}₫</span>
                                                </span> <!-- Giá Khuyến mại -->
                                                <span class="old-price">
                                                    <del
                                                        class="product-price-old sale">{{ number_format($product->price, 0, ',', '.') }}₫</del>
                                                </span> <!-- Giá gốc -->

                                                <div class="label_product">
                                                    -{{ round((($product->price - $product->pricesale) / $product->price) * 100) }}%
                                                </div>
                                                <div class="save-price">
                                                    (Tiết kiệm:
                                                    <span>{{ number_format($product->price - $product->pricesale, 0, ',', '.') }}₫</span>)
                                                </div>
                                            @else
                                                <span
                                                    class="price product-price">{{ number_format($product->price, 0, ',', '.') }}₫</span>
                                                <!-- Giá gốc -->
                                            @endif
                                        </div>
                                        <style>
                                            .description {
                                                overflow: hidden;
                                                text-overflow: ellipsis;
                                                display: -webkit-box;
                                                -webkit-line-clamp: 5;
                                                /* Số dòng tối đa hiển thị */
                                                -webkit-box-orient: vertical;
                                            }
                                        </style>

                                        <div class="description">
                                            {{ $product->description }}
                                        </div>
                                        <div class="form-product pt-3">

                                            <div class="box-variant clearfix ">

                                                <input type="hidden" name="variantId" value="51261092">

                                            </div>
                                            <div class="form_button_details margin-top-15 w-100">
                                                <div class="form_product_content type1 ">
                                                    <div class="soluong soluong_type_1 show">
                                                        <label>Số lượng:</label>
                                                        <div class="custom input_number_product custom-btn-number ">
                                                            <button class="btn btn_num num_1 button button_qty hover-btn"
                                                                onclick="var result = document.getElementsByClassName('pd-qtym')[0];var stick_result = document.getElementsByClassName('pd-qtym')[1]; var qtypro = result.value; if(!isNaN( qtypro ) &amp;&amp; qtypro > 1){result.value--;stick_result.value--;}else{return false;}"
                                                                type="button">
                                                                <svg class="icon">
                                                                    <use xlink:href="#icon-minus"></use>
                                                                </svg>
                                                            </button>
                                                            <input type="text" id="qty" name="qty"
                                                                value="1" maxlength="3"
                                                                class="form-control prd_quantity pd-qtym"
                                                                style=" color:#d82e4d;border-color: #d82e4d;">

                                                            <button class="btn btn_num num_2 button button_qty hover-btn"
                                                                onclick="var result = document.getElementsByClassName('pd-qtym')[0];var stick_result = document.getElementsByClassName('pd-qtym')[1]; var qtypro = result.value; if( !isNaN( qtypro )) result.value++;stick_result.value++;return false;"
                                                                type="button">
                                                                <svg class="icon">
                                                                    <use xlink:href="#icon-plus"></use>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    </div>

                                                    <style>
                                                        .hover-btn {
                                                            transition: background-color 0.3s ease, border-color 0.3s ease;
                                                            border: 1px solid #d82e4d;
                                                            /* Viền mặc định */
                                                        }

                                                        .hover-btn:hover {
                                                            background-color: #d82e4d;
                                                            border-color: #d82e4d;
                                                        }
                                                    </style>

                                                    <div class="button_actions clearfix"
                                                        style="grid-template-columns:1fr 1fr ">

                                                        <button type="button" class="btn btn_base btn-main buynow">
                                                            <span class="text_1" onclick="handleAddCart({{ $product->id }}, 'checkout')">Mua ngay</span>
                                                        </button>
                                                        <button type="button" class="btn btn_base btn_add_cart btn-cart add_to_cart">
                                                            <span class="text_1" onclick="handleAddCart({{ $product->id }}, 'addcart')">Thêm vào giỏ</span>
                                                        </button>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <div class="product-policises-wrapper">
                                    <ul class="product-policises list-unstyled row ">
                                        <li class="media col-12">
                                            <div class="mr-3">
                                                <img class="img-fluid " width="32" height="32"
                                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_product_image_1.png?1692086228721"
                                                    alt="Giao hàng toàn quốc">
                                            </div>
                                            <div class="media-body">
                                                Giao hàng toàn quốc
                                            </div>
                                        </li>
                                        <li class="media col-12">
                                            <div class="mr-3">
                                                <img class="img-fluid " width="32" height="32"
                                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_product_image_2.png?1692086228721"
                                                    alt="Tích điểm tất cả sản phẩm">
                                            </div>
                                            <div class="media-body">
                                                Tích điểm tất cả sản phẩm
                                            </div>
                                        </li>
                                        <li class="media col-12">
                                            <div class="mr-3">
                                                <img class="img-fluid " width="32" height="32"
                                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_product_image_3.png?1692086228721"
                                                    alt="Giảm 5% khi thanh toán online">
                                            </div>
                                            <div class="media-body">
                                                Giảm 5% khi thanh toán online
                                            </div>
                                        </li>
                                        <li class="media col-12">
                                            <div class="mr-3">
                                                <img class="img-fluid " width="32" height="32"
                                                    src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_product_image_4.png?1692086228721"
                                                    alt="Cam kết chính hãng">
                                            </div>
                                            <div class="media-body">
                                                Cam kết chính hãng
                                            </div>
                                        </li>

                                    </ul>
                                </div>


                            </div>


                        </div>



                    </div>
                </div>
            </div>
        </div>


    </section>
    <section class="section sec_tab ">
        <div class="container card  px-3 py-3">
            <div class="row">
                <div class="col-12 col-xl-9 pr-xl-5 product-content">
                    <div class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                        <h2 class="heading-bar__title ">
                            Mô tả sản phẩm
                        </h2>
                    </div>
                    <div id="ega-uti-editable-content" data-platform="sapo" data-id="23009191"
                        class="rte product_getcontent py-3 pos-relative border-top"
                        style="border-color: var(--text-color)!important">

                        <div id="content">
                            {{ $product->detail }}
                        </div>




                    </div>
                    <div class="ega-pro__seemore text-center pos-relative my-3" style="display: none;">
                        <a href="javascript:void(0)" title="Xem thêm" class="btn btn-main  ">
                            Xem thêm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>
    </div>
    </section>

    <section class="section sec_tab ">
        <div class="container card py-2 related-product">
            <div class="title_module mb-3 heading-bar d-flex justify-content-between align-items-center">
                <h2 class="bf_flower heading-bar__title">
                    Sản phẩm cùng loại
                </h2>
            </div>


            <div class="section_prd_feature" id="sidebarproduct">
                <div
                    class="section products product_related slick-product slickrelated row slick-initialized slick-slider">
                    <button type="button" data-role="none" class="slick-prev slick-arrow slick-disabled"
                        aria-label="Previous" role="button" aria-disabled="true"
                        style="display: inline-block;">Previous</button>

                    <div aria-live="polite" class="slick-list draggable">
                        <div class="slick-track" style="opacity: 1; width: 1512px; transform: translate3d(0px, 0px, 0px);"
                            role="listbox">
                            @foreach ($list_product as $product)
                                <div class="item   col-7 col-md-5 col-lg-15 slick-slide slick-active"
                                    style="width: 252px;" tabindex="-1" role="option" aria-describedby="slick-slide01"
                                    data-slick-index="1" aria-hidden="false">
                                    @include('components.product-card', ['product' => $product])

                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </section>

    </section>

    <head>
        <meta charset="UTF-8">
        <meta name="theme-color" content="#f02b2b">
        <link rel="canonical"
            href="https://ega-cosmetic.mysapo.net/bo-san-pham-cham-soc-da-sach-thoang-toan-dien-la-roche-posay-micellar-water">
        <meta name="revisit-after" content="2 days">
        <meta name="robots" content="noodp,index,follow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

        <meta name="description"
            content="BỘ SẢN PHẨM BAO GỒM 01 x Nước tẩy trang làm sạch sâu &amp; kiểm soát bã nhờn cho da dầu nhạy cảm La Roche-Posay Micellar Water Ultra Oily Skin 400ml 01 x Gel rửa mặt tạo bọt làm sạch &amp; giảm nhờn cho da dầu nhạy cảm La Roche-Posay Effaclar Purifying Foaming Gel 400ml THÔNG TIN CHI TIẾT 1. Nước làm sạch sâu tẩy trang cho da ">
        <title>Bộ sản phẩm chăm sóc da La Roche-Posay Micellar Water</title>
        <meta name="keywords"
            content="Bộ sản phẩm chăm sóc da La Roche-Posay Micellar Water, Sạch sâu ẩm mịn, Sữa rửa mặt, Sản phẩm nổi bật, sạch sâu ẩm mịn, sanphamlienquan_2, EGA Cosmetic, ega-cosmetic.mysapo.net">


        <meta property="og:type" content="product">
        <meta property="og:title" content="Bộ sản phẩm chăm sóc da La Roche-Posay Micellar Water">

        <meta property="og:image"
            content="https://bizweb.dktcdn.net/thumb/grande/100/426/076/products/frame-2.jpg?v=1627285970280">
        <meta property="og:image:secure_url"
            content="https://bizweb.dktcdn.net/thumb/grande/100/426/076/products/frame-2.jpg?v=1627285970280">

        <meta property="og:image"
            content="https://bizweb.dktcdn.net/thumb/grande/100/426/076/products/cec3d67d54ac47444841d4dbd6ff5398.jpg?v=1627285970280">
        <meta property="og:image:secure_url"
            content="https://bizweb.dktcdn.net/thumb/grande/100/426/076/products/cec3d67d54ac47444841d4dbd6ff5398.jpg?v=1627285970280">

        <meta property="og:price:amount" content="850.000">
        <meta property="og:price:currency" content="VND">

        <meta property="og:description"
            content="BỘ SẢN PHẨM BAO GỒM 01 x Nước tẩy trang làm sạch sâu &amp; kiểm soát bã nhờn cho da dầu nhạy cảm La Roche-Posay Micellar Water Ultra Oily Skin 400ml 01 x Gel rửa mặt tạo bọt làm sạch &amp; giảm nhờn cho da dầu nhạy cảm La Roche-Posay Effaclar Purifying Foaming Gel 400ml THÔNG TIN CHI TIẾT 1. Nước làm sạch sâu tẩy trang cho da ">
        <meta property="og:url"
            content="https://ega-cosmetic.mysapo.net/bo-san-pham-cham-soc-da-sach-thoang-toan-dien-la-roche-posay-micellar-water">
        <meta property="og:site_name" content="EGA Cosmetic">
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
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-4-3-min.css?1692086228721">

        <link rel="preload" as="style" type="text/css"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721">
        <link rel="preload" as="style" type="text/css"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721">
        <link rel="preload" as="style" type="text/css"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721">



        <link rel="preload" as="image"
            href="//bizweb.dktcdn.net/thumb/large/100/426/076/products/frame-2.jpg?v=1627285970280">
        <link rel="stylesheet"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-4-3-min.css?1692086228721">
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
        <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_style.scss.css?1692086228721"
            rel="stylesheet" type="text/css" media="all">
        <link rel="preload" as="script"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721">
        <script src="https://connect.facebook.net/vi_VN/sdk.js?hash=5befa7fc439fe0cab5ce37cac15f6b9f" async=""
            crossorigin="anonymous"></script>
        <script id="facebook-jssdk" src="//connect.facebook.net/vi_VN/sdk.js#xfbml=1&amp;version=v2.0"></script>
        <script type="text/javascript" async=""
            src="//newproductreviews.sapoapps.vn/assets/js/productreviews.min.js?store=ega-cosmetic.mysapo.net"></script>
        <script type="text/javascript" async=""
            src="https://buyx-gety.sapoapps.vn/assets/script.v2.js?store=ega-cosmetic.mysapo.net"></script>
        <script type="text/javascript" async="" src="https://combo.sapoapps.vn/assets/script.js?store=ega-cosmetic.mysapo.net">
        </script>
        <script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721" type="text/javascript">
        </script>
        <link rel="preload" as="script"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721">
        <script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721" type="text/javascript">
        </script>
        <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721"
            rel="stylesheet" type="text/css" media="all">
        <script>
            var Bizweb = Bizweb || {};
            Bizweb.store = 'ega-cosmetic.mysapo.net';
            Bizweb.id = 426076;
            Bizweb.theme = {
                "id": 917889,
                "name": "EGA Cosmetic_v1.4.0_20230815_dev",
                "role": "main"
            };
            Bizweb.template = 'product';
            if (!Bizweb.fbEventId) Bizweb.fbEventId = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0,
                    v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        </script>
        <script>
            (function() {
                function asyncLoad() {
                    var urls = ["https://combo.sapoapps.vn/assets/script.js?store=ega-cosmetic.mysapo.net",
                        "https://buyx-gety.sapoapps.vn/assets/script.v2.js?store=ega-cosmetic.mysapo.net",
                        "//newproductreviews.sapoapps.vn/assets/js/productreviews.min.js?store=ega-cosmetic.mysapo.net"
                    ];
                    for (var i = 0; i < urls.length; i++) {
                        var s = document.createElement('script');
                        s.type = 'text/javascript';
                        s.async = true;
                        s.src = urls[i];
                        var x = document.getElementsByTagName('script')[0];
                        x.parentNode.insertBefore(s, x);
                    }
                };
                window.attachEvent ? window.attachEvent('onload', asyncLoad) : window.addEventListener('load', asyncLoad,
                    false);
            })();
        </script>


        <script>
            window.BizwebAnalytics = window.BizwebAnalytics || {};
            window.BizwebAnalytics.meta = window.BizwebAnalytics.meta || {};
            window.BizwebAnalytics.meta.currency = 'VND';
            window.BizwebAnalytics.tracking_url = '/s';

            var meta = {};

            meta.product = {
                "id": 22534539,
                "vendor": "La Roche-Posay",
                "name": "Bộ sản phẩm chăm sóc da La Roche-Posay Micellar Water",
                "type": "Sữa rửa mặt",
                "price": 850000
            };


            for (var attr in meta) {
                window.BizwebAnalytics.meta[attr] = meta[attr];
            }
        </script>


        <script src="/dist/js/stats.min.js?v=96f2ff2"></script>
        <script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>
        <script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>













        <script rel="dns-prefetch" type="text/javascript">
            var ProductReviewsAppUtil = ProductReviewsAppUtil || {};
        </script>


        <script type="application/ld+json">
			{
        "@context": "http://schema.org",
        "@type": "BreadcrumbList",
        "itemListElement": 
        [
            {
                "@type": "ListItem",
                "position": 1,
                "item": 
                {
                  "@id": "https://ega-cosmetic.mysapo.net",
                  "name": "Trang chủ"
                }
            },
      
            {
                "@type": "ListItem",
                "position": 2,
                "item": 
                {
                  "@id": "https://ega-cosmetic.mysapo.net/bo-san-pham-cham-soc-da-sach-thoang-toan-dien-la-roche-posay-micellar-water",
                  "name": "Bộ sản phẩm chăm sóc da La Roche-Posay Micellar Water"
                }
            }
      
        
      
      
      
      
    
        ]
        }
		</script>

        <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/appcombo.css?1692086228721" rel="stylesheet"
            type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="https://newproductreviews.sapoapps.vn/assets/css/bpr.min.css?v=1.0"
            media="all">
        <link rel="stylesheet" type="text/css"
            href="https://newproductreviews.sapoapps.vn/assets/css/productReviews.min.css?v=1.0" media="all">
        <link rel="stylesheet" href="https://buyx-gety.sapoapps.vn/assets/buyxgety.css">
        <script type="text/javascript" src="https://newproductreviews.sapoapps.vn/assets/js/lang/vi.min.js"></script>
        <script src="https://mixcdn.egany.com/themes/smartsearch-builtin/smartsearch-v2.min.js"></script>
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

            .tw-bg-#d82e4d\/40 {
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
    </head>
@endsection
@section('footer')
    <link rel="stylesheet" href="home.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    {{-- them vao gio hang --}}
    <script>
        function handleAddCart(productid, action) {
            let qty = document.getElementById("qty").value;
            $.ajax({
                url: "{{ route('site.cart.addcart') }}",
                type: "GET",
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(result, status, xhr) {
                document.getElementById("showqty").innerHTML = result;

                // Thông báo khác nhau dựa trên hành động
                if (action === 'checkout') {
                    alert("Bạn sẽ được chuyển đến trang thanh toán để hoàn tất đơn hàng.");
                    // Chuyển hướng đến trang thanh toán
                    window.location.href = "{{ route('site.cart.checkout') }}";
                } else {
                    alert("Thêm vào giỏ hàng thành công");
                    // Không chuyển hướng nếu là 'addcart'
                }
            },
                error: function(xhr, status, error) {
                    alert("Đã xảy ra lỗi: " + error);
                }
            });
        }
    </script>
    
@endsection




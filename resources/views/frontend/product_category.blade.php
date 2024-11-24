@extends('layouts.site')
@section('title', 'Sản phẩm theo danh mục')
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
                    </li>
                    <li><strong><span>{{ $row->name }}</span></strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="section wrap_background">
    <div class="container">
        <div class="bg_collection section">
            <div class="row">
                <aside class=" scroll card py-2 dqdt-sidebar sidebar left-content col-lg-15 col-md-12 col-sm-12">
                    <div class="wrap_background_aside asidecollection">
                        <div class="filter-content aside-filter">
                            <div class="filter-container">
                                <!-- Lọc Hãng -->
                                <x-mod-list-brand />
                                <aside class="aside-item filter-vendor">
                                    <div class="aside-title">
                                        <h2 class="title-head margin-top-0"><span>Mức giá</span></h2>
                                    </div>
                                    <div class="aside-content filter-group scroll">
                                        <ul class="price-list ml-3">
                                            <li>
                                                <a
                                                    href="{{ route('site.product.category', ['slug' => $row->slug, 'price_range' => '0-100000']) }}">
                                                    Dưới 100.000đ
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('site.product.category', ['slug' => $row->slug, 'price_range' => '100000-200000']) }}">
                                                    100.000đ - 200.000đ
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('site.product.category', ['slug' => $row->slug, 'price_range' => '200000-300000']) }}">
                                                    200.000đ - 300.000đ
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="{{ route('site.product.category', ['slug' => $row->slug, 'price_range' => '300000-500000']) }}">
                                                    300.000đ - 500.000đ
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </aside>
                                <!-- End Lọc theo giá -->

                                <!-- Lọc Loại -->
                                <x-mod-list-category />
                                <!-- End Lọc Loại -->
                                <style>
                                    .price-list {
                                        list-style-type: none;
                                        padding: 0;
                                        margin: 0;
                                    }

                                    .price-list li {
                                        margin-bottom: 10px;
                                    }

                                    .price-list li .filter-links {
                                        text-decoration: none;
                                        color: #000;
                                        font-weight: normal;
                                        text-transform: none;
                                    }

                                    .price-list li :hover {
                                        color: #ff4d4d;
                                    }

                                    .hidden-price {
                                        display: none;
                                    }

                                    .filter-item-toggle.show i {
                                        transform: rotate(180deg);
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                </aside>

                <div class="card py-2 main_container collection col-xl col-md-12 col-sm-12">
                    <h1 class="title_page collection-title mb-0">
                        {{ $row->name }}
                    </h1>
                    <div class="category-products products">
                        <div class="border-bottom">
                            <div class=" d-flex justify-content-between align-items-baseline">
                                <div class="sortPagiBar">
                                    <div class="sort-cate clearfix">
                                        <div id="sort-by" class="d-flex align-items-baseline">
                                            <label class="left">
                                                <span class="">Sắp xếp: </span></label>
                                            <ul class="ul_col ml-2 mb-0">
                                                <li><span
                                                        class="d-flex d-lg-none align-items-center justify-content-between">Thứ
                                                        tự </span>
                                                    <i class="fas fa-chevron-down float-right"></i>
                                                    <ul class="content_ul">
                                                        <li data-sort="name:asc">
                                                            <a class="link" href="javascript:;"
                                                                onclick="sortby('name:asc')">Tên A → Z</a>
                                                        </li>
                                                        <li data-sort="name:desc">
                                                            <a class="link" href="javascript:;"
                                                                onclick="sortby('name:desc')">Tên Z → A</a>
                                                        </li>
                                                        <li data-sort="price_min:asc">
                                                            <a class="link" href="javascript:;"
                                                                onclick="sortby('price-asc')">Giá tăng dần</a>
                                                        </li>
                                                        <li data-sort="price_min:desc">
                                                            <a class="link" href="javascript:;"
                                                                onclick="sortby('price-desc')">Giá giảm dần</a>
                                                        </li>
                                                        <li data-sort="created_on:desc">
                                                            <a class="link" href="javascript:;"
                                                                onclick="sortby('created-desc')">Hàng mới </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                {{-- Sắp xếp --}}
                                <script>
                                    function sortby(sortType) {
                                        var url = "{{ route('site.product.category', ['slug' => $row->slug]) }}";
                                        var params = { sort_by: sortType };
                                
                                        $.ajax({
                                            url: url,
                                            type: 'GET',
                                            data: params,
                                            success: function(response) {
                                                $('.content-col').html($(response).find('.content-col').html());
                                            },
                                            error: function(xhr) {
                                                console.log(xhr.responseText);
                                            }
                                        });
                                    }
                                </script>


                            </div>
                        </div>

                        <div class="products-view products-view-grid collection_reponsive list_hover_pro">
                            <div class="row content-col">
                                @foreach($list_product as $productitem)
                                <div class="col-lg-3 col-md-3 col-sm-3 col-6 product-col">
                                    <x-product-card :$productitem />
                                </div>
                                @endforeach
                            </div>
                            <div class="row mt-5">
                                <div class="col-12 d-flex justify-content-center">
                                    {{-- Phân trang lọc --}}
                                    {{-- {{ $list_product->appends(request()->query())->links() }}  --}}
                                    {{ $list_product->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" media="all">
<link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/fonts.css?1692084315105" media="all">




<div class="modal fade" id="ega-modal-banner" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md align-vertical" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="/collections/all">
                    <img class="img-fluid"
                        src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/banner_popup_img.png?1692086228721"
                        alt="welcome popup" width="765" height="765">
                </a>
                <button class="btn-form-close close" type="button" data-dismiss="modal" aria-label="Close"><i
                        class="fa fa-times"></i></button>
            </div>
        </div>
    </div>
</div>

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
<link rel="preload" as="script" href="//bizweb.dktcdn.net/assets/themes_support/api.jquery.js">

<script src="//bizweb.dktcdn.net/assets/themes_support/api.jquery.js" type="text/javascript"></script>

<link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-sharing.css?1692086228721"
    media="all" onload="this.media='all'">

<noscript>
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-sharing.css?1692086228721" rel="stylesheet"
        type="text/css" media="all" />
</noscript>

<!--link css-->


<link rel="icon" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/favicon.png?1692086228721"
    type="image/x-icon">

<link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-4-3-min.css?1692086228721">

<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/main.scss.css?1692086228721" rel="stylesheet"
    type="text/css" media="all">

<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721"
    rel="stylesheet" type="text/css" media="all">
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721"
    rel="stylesheet" type="text/css" media="all">
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/sidebar_style.scss.css?1692086228721" rel="stylesheet"
    type="text/css" media="all">
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/collection_style.scss.css?1692086228721"
    rel="stylesheet" type="text/css" media="all">
<link rel="preload" as="script" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721">
<script id="facebook-jssdk" src="https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js"></script>
<script type="text/javascript" async=""
    src="//newproductreviews.sapoapps.vn/assets/js/productreviews.min.js?store=ega-cosmetic.mysapo.net">
</script>
<script type="text/javascript" async=""
    src="https://buyx-gety.sapoapps.vn/assets/script.v2.js?store=ega-cosmetic.mysapo.net"></script>
<script type="text/javascript" async="" src="https://combo.sapoapps.vn/assets/script.js?store=ega-cosmetic.mysapo.net">
</script>
<script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/jquery.js?1692086228721" type="text/javascript">
</script>
<link rel="preload" as="script" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721">
<script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721" type="text/javascript">
</script>
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/responsive.scss.css?1692086228721" rel="stylesheet"
    type="text/css" media="all">



<script src="/dist/js/stats.min.js?v=96f2ff2"></script>
<script async="" src="//bizweb.dktcdn.net/web/assets/lib/js/fp.v3.3.0.min.js"></script>
<link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/appcombo.css?1692086228721" rel="stylesheet"
    type="text/css" media="all">

@endsection
@section('header')
<link rel="stylesheet" href="home.css">

@endsection
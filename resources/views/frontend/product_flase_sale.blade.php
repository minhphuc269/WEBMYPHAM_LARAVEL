@extends('layouts.site')
@section('title', 'Sản phẩm giảm giá')
@section( 'content')

<body>

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


                        <li><strong><span> Sản phẩm giảm giá</span></strong></li>


                    </ul>
                </div>
            </div>
        </div>
    </section>





    <div class="section mb-3 mt-6">
        <link rel="preload" as="style" type="text/css"
            href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/coupon.css?1692086228721">

        <link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/coupon.css?1692086228721">
        <!-- ℹ-->







    </div>

    <section class="section_flashsale flashsale  container" style="--background-color: #d82e4d;
    --countdown-background: #ffffff;
    --countdown-color: #d82e4d
    ">
        <div class="container  py-2 card border-0 ">


            <div class="category-products products">

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
                            {{ $list_product->links() }}
                        </div>
                    </div>
                </div>
                <div class="section pagenav">

                    <nav class="clearfix relative nav_pagi w_100">
                        <ul class="pagination clearfix float-right">

                            <li class="page-item disabled"><a class="page-link" href="#"><i
                                        class="fa fa-angle-left"></i></a></li>






                            <li class="active page-item disabled"><a class="page-link" href="javascript:;">1</a></li>








                            <li class="page-item"><a class="page-link" onclick="doSearch(2)"
                                    href="?&amp;page=2&amp;view=grid">2</a></li>





                            <li class="page-item hidden-xs"><a class="page-link" onclick="doSearch(2)"
                                    href="?&amp;page=2&amp;view=grid"><i class="fa fa-angle-right"
                                        aria-hidden="true"></i>
                                </a></li>

                        </ul>
                    </nav>
                    <script>
                        var cuPage = 1
            
                    </script>

                </div>

            </div>


        </div>

        </div>
    </section>











    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" media="all">
    <link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/fonts.css?1692084315105"
        media="all">




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
        <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/addthis-sharing.css?1692086228721"
            rel="stylesheet" type="text/css" media="all" />
    </noscript>

    <!--link css-->


    <link rel="icon" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/favicon.png?1692086228721"
        type="image/x-icon">

    <link rel="stylesheet"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/bootstrap-4-3-min.css?1692086228721">

    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/main.scss.css?1692086228721" rel="stylesheet"
        type="text/css" media="all">

    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/product_infor_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/quickviews_popup_cart.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/sidebar_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
    <link href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/collection_style.scss.css?1692086228721"
        rel="stylesheet" type="text/css" media="all">
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
    <link rel="preload" as="script"
        href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721">
    <script src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/slick-min.js?1692086228721"
        type="text/javascript"></script>
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
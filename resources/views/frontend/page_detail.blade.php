@extends('layouts.site')
@section('title', 'Chi tiết trang đơn')
@section('content')
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

                    <li><strong><span>{{ $page->title }}</span></strong></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="blogpage section">
    <div class="containers" itemscope="" itemtype="https://schema.org/Blog">
        <meta itemprop="name" content="Tin tức">
        <meta itemprop="description" content="">
        <div class="wrap_background_aside margin-bottom-0">
            <div class="container card py2">
                <div class="row">

                    <div class="col-lg-3 col-12 left-content sidebar mt-5">
                        <aside class="aside-item blog-sidebar sidebar-category margin-bottom-25">
                            <div class="aside-title">
                                <h2 class="title-head margin-top-0 cate"><span>Các trang khác</span></h2>
                            </div>
                            <div class="aside-content">
                                <nav class="nav-category navbar-toggleable-md">
                                    <ul class="nav navbar-pills flex-column">
                                        @foreach($list_page as $other_page)
                                        <li class="list-group-item">
                                            <a href="{{ route('site.page.detail', $other_page->slug) }}">{{
                                                $other_page->title }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </aside>

                    </div>
                    <div class="vertical-divider"></div>
                    <section class="right-content col-lg-9 col-md-12 col-sm-12 col-xs-12 py-3 mx-auto">
                        <article class="article-main">
                            <div class="article-details">
                                <img class="img-fluid mx-auto mb-3 d-block mh-100 w-auto"
                                    src="{{ asset('images/posts/' . $page->image) }}" alt="{{ $page->title }}">
                                <h1 class="article-title title_page">{{ $page->title }}</h1>
                                <div class="article-content js-toc-content">
                                    <div class="rte" id="ega-uti-editable-content" data-platform="sapo"
                                        data-id="2224354" data-blog-id="526549">
                                        <p>
                                            {!! $page->detail !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="tag-share">
                                <div class="row">
                                    <div class="col-12 share_social mt-3">
                                        <div class="addthis_inline_share_toolbox share_add no-tag">
                                            <script type="text/javascript"
                                                src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-58589c2252fc2da4">
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section clearfix mt-3">

                            </div>
                        </article>
                    </section>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .list-group-item a:hover {
        color: #ff4d4d;
    }

    .aside-title h2 {
        font-weight: 500;
    }

    /* CSS để tạo đường chia dọc */
    .vertical-divider {
        border-right: 1px solid #2b2929;
        /* Đường gạch dọc màu xám */
        height: 100%;
        /* Chiều cao bằng chiều cao của các phần tử xung quanh */
        position: absolute;
        /* Vị trí tuyệt đối */
        top: 0;
        /* Vị trí bắt đầu từ đầu trang */
        bottom: 0;
        /* Vị trí kết thúc đến cuối trang */
        left: calc(50% - 1px);
        /* Vị trí giữa hai phần tử */
    }
</style>

@endsection
@section('header')
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
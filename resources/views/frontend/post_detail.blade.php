@extends('layouts.site')
@section('title', 'Chi tiết bài viết')
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
                    <li class="post">
                        <a href="{{ route('site.post.post_all') }}" class="link"><span>Tất cả bài viết</span></a>
                        <span class="mr_lr">&nbsp;/&nbsp;</span>
                    </li>

                    <li><strong><span>{{ $post->title }}</span></strong></li>
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
                    <section class="right-content col-lg-9 col-md-12 col-sm-12 col-xs-12 py-3 mx-auto">
                        <article class="article-main">
                            <div class="article-details">
                                <img class="img-fluid mx-auto mb-3 d-block mh-100 w-auto"
                                    src="{{ asset('images/posts/' . $post->image) }}" alt="{{ $post->title }}">
                                <h1 class="article-title title_page">{{ $post->title }}</h1>
                                <div class="media ">
                                    <div class="media-body ">
                                        <div class="mt-0">{{ $post->author }}</div>
                                        <small class="text-muted font-weight-light">
                                            {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                        </small>
                                    </div>
                                </div>

                                <div class="article-content js-toc-content">
                                    <div class="rte" id="ega-uti-editable-content" data-platform="sapo"
                                        data-id="2224354" data-blog-id="526549">
                                        {{$post->detail }}
                                        <!-- Assuming content field contains HTML content -->
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
                    <div class="vertical-divider"></div>
                    <div class="col-lg-3 col-12 left-content sidebar mt-5">
                        <aside class="aside-item blog-sidebar sidebar-category margin-bottom-25">
                            <div class="aside-title">
                                <h2 class="title-head margin-top-0 cate"><span>Chủ đề</span></h2>
                            </div>
                            <div class="aside-content">
                                <nav class="nav-category navbar-toggleable-md">
                                    <ul class="nav navbar-pills flex-column">
                                        @foreach($list_topic as $topic)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ route('site.post.topic',['slug'=>$topic->slug]) }}">
                                                {{ $topic->name }}
                                            </a>
                                        </li>
                                        
                                        @endforeach
                                    </ul>
                                </nav>
                            </div>
                        </aside>
                        <div class="blog-aside aside-item blog-aside-article mt-5">
                            <div class="aside-title">
                                <h2 class="title-head"><span><a href="/tin-tuc" title="Bài viết mới nhất">Bài viết cùng
                                            chủ đề</a></span></h2>
                            </div>
                            <div class="aside-content-article aside-content margin-top-0">
                                <div class="blog-list blog-image-list">
                                    @foreach ($mod_post_topic as $post)
                                    <div class="blogwp clearfix media">
                                        <a class="image-blog text-center mr-3"
                                            href="{{ route('site.post.detail', ['slug' => $post->slug]) }}"
                                            title="{{ $post->title }}">
                                            <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}"
                                                alt="{{ $post->title }}">
                                        </a>
                                        <div class="content_blog clearfix media-body">
                                            <h3 class="mt-0">
                                                <a class="linkk"
                                                    href="{{ route('site.post.detail', ['slug' => $post->slug]) }}"
                                                    title="{{ $post->title }}">{{ $post->title }}</a>
                                            </h3>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .aside-title h2 {
        font-weight: 500;
    }

    .nav-item .nav-link {
        font-weight: normal;
    }

    .aside-content .nav-category .nav-item .nav-link {
        font-weight: normal;
        text-transform: none;
        color: black;
    }

    .aside-content .nav-category .nav-item .nav-link:hover {
        color: #ff4d4d;
    }

    h3.mt-0 {
        font-weight: normal;
        text-transform: none;
    }

    h3.mt-0 .linkk {
        font-weight: normal;
        text-transform: none;
    }

    h3.mt-0 .linkk:hover {
        color: #ff4d4d;
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
<link rel="stylesheet" href="home.css">
@endsection
@extends('layouts.site')
@section('title', 'Tin tức')
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
                    <li><strong><span>Tất cả bài viết</span></strong></li>
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
                    <div class="col-lg-9 col-12 py-3 content-blog">
                        <h1 class="title_page mb-3">Tất cả bài viết</h1>
                        <div class="row">
                            @foreach ($list_post as $post)
                            <div class="col-md-4 col-6 product-col">
                                <div class="blogwp clearfix card border-0">
                                    <a class="image-blog card-img-top text-center position-relative d-flex align-items-center justify-content-center aspect-ratio"
                                        href="{{route('site.post.detail',['slug'=>$post->slug])}}"
                                        title="{{ $post->title }}" style="--width: 362; --height: 162">
                                        <img class="img-fluid m-auto object-contain mh-100 w-auto position-absolute"
                                            src="{{ asset('images/posts/'.$post->image) }}" width="326" height="162"
                                            alt="{{ $post->title }}">
                                    </a>
                                    <div class="content_blog clearfix card-body px-0 py-2">
                                        <h3>
                                            <a class="link" href="{{route('site.post.detail',['slug'=>$post->slug])}}"
                                                title="{{ $post->title }}">{{ $post->title }}</a>
                                        </h3>
                                        <div class="media">
                                            <div class="media-body">
                                                <div class="mt-0">{{ $post->author }}</div>
                                                <small class="text-muted font-weight-light">
                                                    {{ Carbon\Carbon::parse($post->created_at)->format('d/m/Y') }}
                                                </small>
                                            </div>
                                        </div>
                                        <p class="justify">
                                            <span class="art-summary">{{ $post->detail }}</span>
                                            <a class="button_custome_35 link"
                                                href="{{route('site.post.detail',['slug'=>$post->slug])}}"
                                                title="Đọc tiếp">Đọc tiếp</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="row mt-5">
                            <div class="col-12 d-flex justify-content-center">
                                {{ $list_post->links() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 left-content sidebar mt-5 ">
                        <aside class="aside-item blog-sidebar sidebar-category collection-category margin-bottom-25">
                            <div class="aside-title">
                                <h2 class="title-head margin-top-0 cate"><span>Bài viết theo chủ đề</span></h2>
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
                       <x-post-new/>
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
</style>
@endsection
@section('header')
<link rel="stylesheet" href="home.css">
@endsection
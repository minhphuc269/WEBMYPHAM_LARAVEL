<div class="blog-aside aside-item blog-aside-article mt-5">
    <div class="aside-title">
        <h2 class="title-head"><span><a href="/tin-tuc" title="Tin nổi bật">Bài viết mới nhất</a></span></h2>
    </div>
    <div class="aside-content-article aside-content margin-top-0">
        <div class="blog-list blog-image-list">
            @foreach ($mod_list_post as $post)
            <div class="blogwp clearfix media">
                <a class="image-blog text-center mr-3"
                    href="{{route('site.post.detail',['slug'=>$post->slug])}}"
                    title="{{ $post->title }}">
                    <img class="img-fluid" src="{{ asset('images/posts/' . $post->image) }}"
                        alt="{{ $post->title }}">
                </a>
                <div class="content_blog clearfix media-body">
                    <h3 class="mt-0">
                        <a class="linkk"
                            href="{{route('site.post.detail',['slug'=>$post->slug])}}"
                            title="{{ $post->title }}">{{ $post->title }}</a>
                    </h3>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
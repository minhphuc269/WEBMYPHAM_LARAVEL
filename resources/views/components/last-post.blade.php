<section class="section awe-section-11">
    <section class="section_blog section">
        <div class="container card border-0 ">
            <div class="title_module_main heading-bar d-flex justify-content-between align-items-center">
                <h2 class="heading-bar__title ">
                    <a class='link' href="tin-tuc" title="TIN KHUYẾN MÃI">TIN KHUYẾN MÃI</a>
                </h2>
            </div>
            <div class="row mt-3">

                <div class="row mt-3">
                    @foreach ($list_post as $post)
                    <div class="col-md-3 mb-4">
                        <div class="blogwp clearfix card border-0">
                            <a class="image-blog card-img-top text-center position-relative d-flex align-items-center justify-content-center aspect-ratio"
                                href="{{ route('site.post.detail', ['slug' => $post->slug]) }}"
                                title="{{ $post->title }}" style="--width: 362; --height: 162">
                                <img class="img-fluid m-auto object-contain mh-100 w-auto position-absolute"
                                    loading="lazy" src="{{ asset('images/posts/' . $post->image) }}" width="326"
                                    height="162" alt="{{ $post->title }}">
                            </a>

                            <div class="content_blog clearfix card-body px-0 py-2">
                                <h3>
                                    <a class="link" href="{{ route('site.post.detail', ['slug' => $post->slug]) }}"
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
                                        href="{{ route('site.post.detail', ['slug' => $post->slug]) }}"
                                        title="Đọc tiếp">Đọc tiếp</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="{{route('site.post.post_all')}}" title="Xem tất cả" class="btn btn-main btn-icon ">
                Xem tất cả

                <svg class="icon">
                    <use xlink:href="#icon-arrow" />
                </svg>
            </a>
        </div>


        </div>
    </section>
</section>
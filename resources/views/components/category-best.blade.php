<section class="section awe-section-2">
    <section class="section_collections section">
        <div class="container card border-0">
            <div class="title_module_main heading-bar ">
                <h2 class="heading-bar__title ">
                    <a class='link' href="collections/all" title="DANH MỤC NỔI BẬT">DANH MỤC NỔI BẬT</a>
                </h2>
            </div>
            <div class="mt-2 text-center row flex-nowrap collections-slide">
                @foreach ($list_category as $category)
                    <div class="item">
                        <a href="{{ url('danh-muc/'.$category->slug) }}" title="{{ $category->name }}"
                        class="pos-relative d-flex align-items-center" style="aspect-ratio: 120/120;">
                            <img class="img-fluid m-auto object-contain mh-100" loading="lazy"
                                src="{{ asset('images/categorys/'.$category->image) }}"
                                width="120" height="120" alt="{{ $category->name }}">
                        </a>
                        <h3 class="mb-0">
                            <a href="{{ url('danh-muc/'.$category->slug) }}" title="{{ $category->name }}">
                                {{ $category->name }}
                            </a>
                        </h3>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
    <style>
        h3 a {
            color: black; /* Thay đổi màu chữ thành màu trắng */
            text-decoration: none; /* Bỏ gạch chân */
        }
        h3 a:hover {
            text-decoration: none; /* Gạch chân khi hover (tuỳ chọn) */
        }
    </style>
    
</section>



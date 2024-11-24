<section class="section awe-section-10">
    <section class="section_brand section">
        <div class="container card border-0">
            <div class="title_module_main heading-bar">
                <h2 class="heading-bar__title">
                    THƯƠNG HIỆU NỔI BẬT
                </h2>
            </div>
            <div class="row mx-0 hrz-scroll text-center flex-nowrap js-slider justify-content-around slick-initialized slick-slider">
                {{-- <button type="button" data-role="none" class="slick-prev slick-arrow slick-disabled" aria-label="Previous" role="button" aria-disabled="true" style="display: inline-block;">Previous</button> --}}
                <div aria-live="polite" class="slick-list draggable">
                    <div class="slick-track d-flex justify-content-center align-items-center" style="opacity: 1; transform: translate3d(0px, 0px, 0px);" role="listbox">
                        @foreach ($brands as $brand)
                        <div class="item slick-slide" style="flex: 0 0 auto; margin-right: 10px;" tabindex="-1" role="option" aria-describedby="slick-slide20" data-slick-index="0" aria-hidden="false">
                            <a href="{{ route('site.product.brand', ['slug' => $brand->slug]) }}" class="brand-item pos-relative d-flex align-items-center aspect-ratio" title="{{ $brand->title }}" style="--width:176; --height:99" tabindex="0">
                                <img class="img-fluid m-auto object-contain" src="{{ asset('images/brands/'.$brand->image) }}" alt="{{ $brand->title }}" width="176" height="99">
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- <button type="button" data-role="none" class="slick-next slick-arrow" aria-label="Next" role="button" aria-disabled="false" style="display: inline-block;">Next</button> --}}
            </div>
        </div>
    </section>
</section>

<style>
    .slick-list {
        overflow: hidden;
    }

    .slick-track {
        display: flex;
        justify-content: center; /* Để căn giữa ngang */
        align-items: center; /* Để căn giữa dọc */
    }

    .slick-slide {
        flex: 0 0 auto;
        margin-right: 10px;
    }

    .brand-item {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 176px;
        height: 99px;
    }

    .brand-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>

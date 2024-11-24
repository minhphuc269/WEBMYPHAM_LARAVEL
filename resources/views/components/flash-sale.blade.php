<section class="section awe-section-4">
    <link rel="stylesheet" href="Giaodien/100/426/076/themes/917889/assets/flashsale.css?1692086228721" media="print"
        onload="this.media='all'">

    <noscript>
        <link href="Giaodien/100/426/076/themes/917889/assets/flashsale.css?1692086228721" rel="stylesheet"
            type="text/css" media="all" />
    </noscript>


    <section class="section_flashsale flashsale" style="--background-color: #d82e4d;
--countdown-background: #ffffff;
--countdown-color: #d82e4d;
--process-background: #fedfe2;
--process-color1: #eb395f;
--process-color2: #fabad3;
--stock-color: #242424;
--news-color: #d82e4d;
">
        <div class="container pt-3 py-2 card border-0 ">

            <div class="title_module_main row heading-bar d-flex justify-content-between align-items-center">
                <div class='d-flex align-items-center flex-wrap flashsale__header col-12 col-lg-6'>
                    <div>
                        <h2 class="heading-bar__title flashsale__title">
                            <a class='link' href="san-pham-flash-sale" title="ƯU ĐÃI HOT, ĐỪNG BỎ LỠ!!">ƯU ĐÃI HOT, ĐỪNG
                                BỎ LỠ!!</a>
                        </h2>
                    </div>

                    <div class="flashsale__countdown-wrapper">
                        <div class="flashsale__countdown" data-countdown-type="hours" data-countdown="">
                        </div>
                    </div>
                </div>

            </div>

            <div class="row content-col">
                @foreach ($product_list as $productitem )
                <div class="col-lg-3 col-md-3 col-sm-3 col-6 product-col">
                    <x-product-card :$productitem />
                </div>
                @endforeach
            </div>
            <div class="text-center mb-3 mt-1">
                <a href="{{ route('site.product.sale') }}" title="Xem tất cả" class="btn btn-main btn-icon">
                    Xem tất cả
                    <svg class="icon">
                        <use xlink:href="#icon-arrow" />
                    </svg>
                </a>


            </div>

        </div>

        </div>
    </section>

    <script src="Giaodien/100/426/076/themes/917889/assets/flashsale.js?1692086228721" defer></script>
</section>
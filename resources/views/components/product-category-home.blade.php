@foreach ($category_list as $cat_row)
<section class="section awe-section-7">
    <section class="section_product_top section">
        <div class="container  card border-0 ">

            <div
                class="title_module_main heading-bar e-tabs  d-flex justify-content-between align-items-center flex-wrap">
                <h2 class="heading-bar__title ">
                    {{$cat_row->name}}
                </h2>

            </div>
            <div class="e-tabs">
                <div id="tab-1" class="tab-content  content_extab  current">
                    <x-product-category :catrow="$cat_row" />
                    <div class="text-center mt-3 col-12">
                        <a href="{{ route('site.product.category',['slug'=>$cat_row->slug]) }}" title="Xem tất cả"
                            class="btn btn-main btn-icon  ">
                            Xem tất cả

                            <svg class="icon">
                                <use xlink:href="#icon-arrow"></use>
                            </svg>
                        </a>

                    </div>


                </div>

            </div>

        </div>
    </section>

</section>
@endforeach
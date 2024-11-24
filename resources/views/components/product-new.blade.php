<div class="container pt-3 py-2 card border-0 ">

    <div class="title_module_main row heading-bar d-flex justify-content-between align-items-center">
        <div class='d-flex align-items-center flex-wrap flashsale__header col-12 col-lg-6'>
            <div>
                <h2 class="heading-bar__title flashsale__title">
                    SẢN PHẨM MỚI
                </h2>
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
        <a href="{{ route('site.product.index') }}" title="Xem tất cả" class="btn btn-main btn-icon">
            Xem tất cả
            <svg class="icon">
                <use xlink:href="#icon-arrow" />
            </svg>
        </a>


    </div>

</div>

<div class="item_product_main">
    <form action="{{ route('site.cart.addcart') }}" method="post" class="variants product-action" data-id="product-actions-{{$product->id}}"
        enctype="multipart/form-data">
        <div class="product-thumbnail pos-relative">
            <a class="image_thumb pos-relative embed-responsive embed-responsive-1by1"
                href="{{route('site.product.detail',['slug'=>$product->slug])}}" title="{{ $product->name }}">
                <img width="480" height="480" style="--image-scale: 1;"
                    src="{{ asset('images/products/'.$product->image) }}" alt="{{ $product->name }}">
            </a>
            @if ($product->pricesale>0)
            <div class="label_product">
                <div class="label_wrapper">
                    -{{ round((($product->price - $product->pricesale) / $product->price) * 100) }}%
                </div>
            </div>
            @endif
            <div class="product-action">
                <div class="group_action" data-url="">
                    <a title="Xem nhanh" href=""
                        class="xem_nhanh btn-circle btn-views btn_view btn right-to quick-view">
                        <i class="fas fa-search"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="product-info">
            <span class="product-vendor">{{ $product->vendor }}</span>
            <h3 class="product-name"><a href="{{route('site.product.detail',['slug'=>$product->slug])}}"
                    title="{{ $product->name }}">{{ $product->name }}</a></h3>
            <div class="product-item-cta position-relative">
                <div class="price-box">
                    @if ($product->pricesale > 0)
                    <span class="price">{{ number_format($product->pricesale) }}₫</span>
                    <span class="compare-price">{{ number_format($product->price) }}₫</span>
                    @else
                    <span class="price">{{ number_format($product->price) }}₫</span>
                    @endif
                    @if ($product->pricesale>0)
                    <div class="label_product d-lg-none d-md-none d-xl-none d-inline-block">
                        <div class="label_wrapper">
                            -{{ round((($product->price - $product->pricesale) / $product->price) * 100) }}%
                        </div>
                    </div>
                    @endif
                </div>
                <input type="hidden" name="variantId" value="{{ $product->variantId }}">
                <button type="button" class="product-item-btn btn add_to_cart active" title="Thêm vào giỏ hàng"
                    onclick="handleAddCart({{ $product->id }})">
                    <svg class="icon">
                        <use xlink:href="#icon-plus"></use>
                    </svg>
                </button>
            </div>
        </div>
    </form>
</div>
{{-- them vao gio hang --}}

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script>
    function handleAddCart(productid) {
        let qty = 1;
        $.ajax({
            url: "{{ route('site.cart.addcart') }}",
            type: "GET",
            data: {
                productid: productid,
                qty: qty
            },
            success: function(result, status, xhr) {
                document.getElementById("showqty").innerHTML = result;
                alert("Thêm vào giỏ hàng thành công");
            },
            error: function(xhr, status, error) {
                alert("Đã xảy ra lỗi: " + error);
            }
        });
    }
</script>
<div class="row content-col">
    @foreach ($product_list as $productitem )
    <div class="col-lg-3 col-md-3 col-sm-3 col-6 product-col">
        <x-product-card :$productitem />
    </div>
    @endforeach
</div>

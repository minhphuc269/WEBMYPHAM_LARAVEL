    <section class="section awe-section-3">
        <link rel="stylesheet" href="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/coupon.css?1692086228721">
        <div class="section_coupons">
            <div class="container card border-0">
                <div class="row scroll justify-content-xl-center">
                    @foreach($list_coupon as $coupon)
                    <div class="py-2 col-xl-3 col-md-5 col-lg col-10">
                        <div class="coupon_item">
                            <div class="coupon_icon pos-relative embed-responsive embed-responsive-1by1">
                                <img class="img-fluid" src="{{ asset('images/coupons/'.$coupon->image) }}" alt="{{ $coupon->name }}" width="79" height="70">
                            </div>
                            <div class="coupon_body">
                                <div class="coupon_head">
                                    <h3 class="coupon_title">NHẬP MÃ: {{ $coupon->code }}</h3>
                                    <div class="coupon_desc">{{ $coupon->description }}</div>
                                </div>
                                <div class="d-flex align-items-center flex-wrap justify-content-between">
                                    <button class="btn btn-main btn-sm coupon_copy" data-ega-coupon="{{ $coupon->code }}">
                                        <span>Sao chép mã</span>
                                    </button>
                                    <span class="coupon_info_toggle" data-coupon="{{ $coupon->code }}">Điều kiện</span>
                                    <div class="coupon_info">
                                        {{ $coupon->condition_coupon }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    
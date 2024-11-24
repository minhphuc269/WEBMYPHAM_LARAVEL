<div class="toogle-nav-wrapper">
    <div class="icon-bar btn menu-bar mr-2 p-0 d-inline-flex">
        <span class="bar"></span>
        <span class="bar"></span>
        <span class="bar"></span>
    </div>
    Danh mục sản phẩm

    <div class="navigation-wrapper">
        <nav class="h-100">
            <ul class="navigation list-group list-group-flush scroll">
                @foreach ($categories as $category)
                    <li class="menu-item list-group-item">
                        <a href="{{ $category->url }}" class="menu-item__link" title="{{ $category->name }}">
                            <img src="{{ $category->image }}" alt="{{ $category->name }}">
                            <span>{{ $category->name }}</span>

                            @if ($category->hasSubMenu())
                                <i class="float-right" data-toggle-submenu="">
                                    <svg class="icon">
                                        <use xlink:href="#icon-arrow"></use>
                                    </svg>
                                </i>
                            @endif
                        </a>

                        @if ($category->hasSubMenu())
                            <div class="submenu scroll">
                                <div class="toggle-submenu d-lg-none d-xl-none">
                                    <i class="mr-3">
                                        <svg class="icon" style="transform: rotate(180deg)">
                                            <use xlink:href="#icon-arrow"></use>
                                        </svg>
                                    </i>
                                    <span>{{ $category->name }}</span>
                                </div>
                                <ul class="submenu__list">
                                    @foreach ($category->subCategories as $subCategory)
                                        <li class="submenu__col">
                                            <span class="submenu__item submenu__item--main">
                                                <a class="link" href="{{ $subCategory->url }}" title="{{ $subCategory->name }}">{{ $subCategory->name }}</a>
                                            </span>

                                            @if ($subCategory->hasSubMenu())
                                                @foreach ($subCategory->subCategories as $subSubCategory)
                                                    <span class="submenu__item submenu__item">
                                                        <a class="link" href="{{ $subSubCategory->url }}" title="{{ $subSubCategory->name }}">{{ $subSubCategory->name }}</a>
                                                    </span>
                                                @endforeach
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>


{{-- <ul class="shop-policises list-unstyled  d-flex align-items-center flex-wrap m-0 pr-0">
    <li>
        <div class="">
            <img class="img-fluid "
                src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_header_image_1.png?1692086228721"
                width="32" height="32" alt="Chính sách đổi trả">
        </div>
        <a class="link" href="/chinh-sach" title="Chính sách đổi trả">Chính sách đổi trả</a>
    </li>
    <li>
        <div class="">
            <img class="img-fluid "
                src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_header_image_2.png?1692086228721"
                width="32" height="32" alt="Hệ thống cửa hàng">
        </div>
        <a class="link" href="/he-thong-cua-hang" title="Hệ thống cửa hàng">Hệ thống cửa hàng</a>
    </li>
    <li>
        <div class="">
            <img class="img-fluid "
                src="//bizweb.dktcdn.net/100/426/076/themes/917889/assets/policy_header_image_3.png?1692086228721"
                width="32" height="32" alt="Kiểm tra đơn hàng">
        </div>
        <a class="link" href="/apps/kiem-tra-don-hang" title="Kiểm tra đơn hàng">Kiểm tra đơn hàng</a>
    </li>

</ul> --}}
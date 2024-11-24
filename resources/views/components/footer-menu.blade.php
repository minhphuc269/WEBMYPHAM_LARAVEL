<div class="col-xs-12 col-md-6 col-xl-2 footer-click">
    <h4 class="title-menu clicked">
        Chính sách <i class="fa fa-angle-down d-md-none d-inline-block"></i>
    </h4>
    <ul class="list-menu toggle-mn">

        @foreach ($list_page as $page)
        <li class="li_menu">
            <a class="link" href="{{ route('site.page.detail', ['slug' => $page->slug]) }}" title="{{ $page->title }}">
                {{ $page->title }}
            </a>
        </li>
        @endforeach

    </ul>
</div>
<div class="col-xs-12 col-md-6 col-xl-2 footer-click">
    <h4 class="title-menu clicked">
        Hỗ trợ khách hàng <i class="fa fa-angle-down d-md-none d-inline-block"></i>
    </h4>
    <ul class="list-menu toggle-mn">

        <li class="li_menu">
            <a class="link" href="{{ route('site.contact') }}" title="Thông tin liên hệ">Thông tin liên hệ</a>
        </li>


    </ul>
</div>
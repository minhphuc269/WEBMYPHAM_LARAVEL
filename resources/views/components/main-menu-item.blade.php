@if(count($list_menu)== 0)
<li class="nav-item" style="margin-left: 10px; margin-right: 10px;">
    <a class="nav-link linkmenu" href="{{ url($menu->link) }}" title="{{ $menu->name }}">{{ $menu->name }}</a>
</li>

@else
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="{{ url($menu->link) }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        {{ $menu->name }}
    </a>
    <ul class="dropdown-menu">
        @foreach ($list_menu as $item )
        <li><a class="dropdown-item" href="{{ url($item->link) }}">{{ $item->name }}</a></li>
        @endforeach


    </ul>
</li>
@endif
<style>
    /* CSS cho các tag <a> trong dropdown */
    .dropdown-menu .dropdown-item {
        color: black; /* Màu chữ đen */
        transition: color 0.3s ease; /* Hiệu ứng chuyển đổi màu */
        text-decoration: none; /* Loại bỏ gạch chân mặc định */
        font-weight: normal; 
    }

    .dropdown-menu .dropdown-item:hover {
        color: #ff4d4d; /* Màu chữ khi đưa trỏ chuột vào */
    }
</style>



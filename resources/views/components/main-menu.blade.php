<ul class="shop-policies list-unstyled d-flex align-items-center flex-wrap m-0 pr-0">
    @foreach ($list_menu as $menuitem)
        <x-main-menu-item :$menuitem />
    @endforeach
</ul>

<style>
    ul.shop-policies a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
        font-weight: bold; 
    }
    ul.shop-policies a:hover {
        color: yellow;
    }

    .dropdown-menu {
        display: none; 
        position: absolute;
        background-color: #fff;
        min-width: 160px;
        z-index: 1;
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block; 
    }
</style>

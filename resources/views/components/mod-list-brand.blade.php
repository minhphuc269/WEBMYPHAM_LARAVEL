<aside class="aside-item filter-vendor">
    <div class="aside-title">
        <h2 class="title-head margin-top-0"><span>Thương hiệu</span></h2>

    </div>
    <div class="aside-content filter-group">
        <ul class="brand-list ml-3">
            @php $counter = 0; @endphp
            @foreach($mod_list_brand as $brand)
            <li>
                {{--
            <li class="{{ $counter >= 5 ? 'hidden-brand' : '' }}"> --}}
                <a href="{{ route('site.product.brand', ['slug' => $brand->slug]) }}">{{ $brand->name }}</a>
            </li>
            @php $counter++; @endphp
            @endforeach
            {{-- @if(count($mod_list_brand) > 5)
            <li class="filter-item-toggle text-center cursor-pointer btn">
                Xem thêm <i class="fas fa-chevron-down"></i>
            </li>
            @endif --}}
        </ul>
    </div>

    <style>
        .brand-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .brand-list li {
            margin-bottom: 10px;
        }

        .brand-list li a {
            text-decoration: none;
            color: #000;
        }

        .brand-list li a:hover {
            color: #ff4d4d;
            /* Màu khi hover */
        }

        .hidden-brand {
            display: none;
        }

        .filter-item-toggle.show i {
            transform: rotate(180deg);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.filter-item-toggle');
            const brandList = document.querySelector('.brand-list');
            
            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    const hiddenBrands = brandList.querySelectorAll('.hidden-brand');
                    
                    hiddenBrands.forEach(function(brand) {
                        brand.classList.toggle('hidden-brand');
                    });
                    
                    if (toggleButton.classList.contains('show')) {
                        toggleButton.innerHTML = 'Xem thêm <i class="fas fa-chevron-down"></i>';
                    } else {
                        toggleButton.innerHTML = 'Thu gọn <i class="fas fa-chevron-up"></i>';
                    }
                    
                    toggleButton.classList.toggle('show');
                });
            }
        });
    </script>
</aside>
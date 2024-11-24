<aside class="aside-item filter-vendor">
    <div class="aside-title">
        <h2 class="title-head margin-top-0"><span>Loại</span></h2>

    </div>
    <div class="aside-content filter-group">
        <ul class="category-list ml-3">
            {{-- @php $counter = 0; @endphp --}}
            @foreach($mod_list_category as $category)
            <li>
                {{--
            <li class="{{ $counter >= 5 ? 'hidden-category' : '' }}"> --}}
                <a href="{{ route('site.product.category', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
            </li>
            {{-- @php $counter++; @endphp --}}
            @endforeach
            {{-- @if(count($mod_list_category) > 5)
            <li class="filter-item-toggle text-center cursor-pointer btn">
                Xem thêm <i class="fas fa-chevron-down"></i>
            </li>
            @endif --}}
        </ul>
    </div>

    <style>
        .category-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .category-list li {
            margin-bottom: 10px;
        }

        .category-list li a {
            text-decoration: none;
            color: #000;
        }

        .category-list li a:hover {
            color: #ff4d4d;
            /* Màu khi hover */
        }

        .hidden-category {
            display: none;
        }

        .filter-item-toggle.show i {
            transform: rotate(180deg);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.querySelector('.filter-item-toggle');
            const categoryList = document.querySelector('.category-list');
            
            if (toggleButton) {
                toggleButton.addEventListener('click', function() {
                    const hiddencategorys = categoryList.querySelectorAll('.hidden-category');
                    
                    hiddencategorys.forEach(function(category) {
                        category.classList.toggle('hidden-category');
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
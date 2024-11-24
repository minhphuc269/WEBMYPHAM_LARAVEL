<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCategoryHome extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }
    public function render(): View|Closure|string
    {
        $args_category=[
            ['status','=',1],
            ['parent_id','=',0],
        ];
        $category_list=Category::where($args_category)
        ->orderBy('created_at','desc')
        ->limit(8)
        ->get();
    return view('components.product-category-home',compact('category_list'));
    }
}

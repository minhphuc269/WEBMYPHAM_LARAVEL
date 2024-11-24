<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FlashSale extends Component
{

    public function __construct()
    {
        //
    }


    public function render(): View|Closure|string
    {
        $args=[
            ['status','=',1],
            ['pricesale','>',0]
        ];
        $product_list=Product::where($args)
            ->orderBy('created_at','desc')
            ->limit(4)
            ->get();
        return view('components.flash-sale',compact('product_list'));
    }
}

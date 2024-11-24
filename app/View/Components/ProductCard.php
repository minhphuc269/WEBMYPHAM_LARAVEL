<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product_item = null;

    public function __construct($productitem)
    {
        $this->product_item = $productitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $product = $this->product_item;
        return view('components.product-card', compact('product'));
    }
}

<?php

namespace App\View\Components;

use App\Models\Brand;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModListBrand extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $mod_list_brand = Brand::where('status', '=',1)
        ->orderBy('sort_order', 'ASC')
        ->select('name', 'slug')
        ->get();
        return view('components.mod-list-brand',compact('mod_list_brand'));
    }
}

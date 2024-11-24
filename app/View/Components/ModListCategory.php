<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModListCategory extends Component
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
        $mod_list_category = Category::where([['parent_id','=',0],['status','=',1]])
        ->orderBy('sort_order','ASC')
        ->select('name','slug')
        ->get(); 
        return view('components.mod-list-category',compact('mod_list_category'));
    }
}

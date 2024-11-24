<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuListCate extends Component
{
    public $categories; 

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->categories = Category::where('status', 1)
            ->where('sort_order', 0)
            ->orderBy('name', 'asc')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-list-cate', ['categories' => $this->categories]);
    }
}
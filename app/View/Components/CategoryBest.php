<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class CategoryBest extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct($categories)
    {
        $this->categories = $categories;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        $list_category=Category::where('status', '=', 1)
        ->orderBy('created_at', 'desc')
        ->limit(9)
        ->get();
        return view('components.category-best',compact('list_category'));
    }
}

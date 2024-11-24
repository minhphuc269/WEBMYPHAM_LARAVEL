<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterMenu extends Component
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
        $list_page = Post::where([['status', '=', 1], ['type', '=', 'page']])->get(['id', 'title', 'slug']); 
        return view('components.footer-menu',compact('list_page'));
    }
}

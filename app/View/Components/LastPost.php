<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class LastPost extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
  
       
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_post = Post::where([['status','=', 1],['type','=', 'post']])
        ->orderBy('created_at', 'desc')
        ->limit(4)
        ->get();
        return view('components.last-post', compact('list_post'));
    }
}
   

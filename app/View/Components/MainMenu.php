<?php

namespace App\View\Components;

use App\Models\Menu;
use Illuminate\View\Component;

class MainMenu extends Component
{
    public $listmenu;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $args_menu = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', 0],
        ];

        $list_menu = Menu::where($args_menu)
            ->orderBy('sort_order', 'asc')
            ->limit(6)
            ->get();
        return view('components.main-menu',compact('list_menu'));
    }
}
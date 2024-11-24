<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenuItem extends Component
{
    public $menu_item=null;
    public function __construct($menuitem)
    {
        $this->menu_item =$menuitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu=$this->menu_item;

        $args=[
            ['status','=',1],
            ['position','=','mainmenu'],
            ['parent_id','=',$menu->id]
        ];
        $list_menu=Menu::where($args)
            ->orderBy('sort_order','asc')
            ->get();
        return view('components.main-menu-item',compact('menu','list_menu'));
    }
}
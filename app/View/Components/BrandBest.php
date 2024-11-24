<?php

namespace App\View\Components;

use App\Models\Brand;
use Illuminate\View\Component;

class BrandBest extends Component
{
    public $brands;

    public function __construct()
    {
        $this->brands = Brand::where('status','=', 1)
                             ->limit(10)
                             ->get();
    }

    public function render()
    {
        return view('components.brand-best', ['brands' => $this->brands]);
    }
}
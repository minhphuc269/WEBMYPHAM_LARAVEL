<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Coupon;
use App\Models\Menu;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $banners = Banner::all();
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        $menus = Menu::where('position', 'mainmenu')->get();
        $coupons=Coupon::all();
    return view('frontend.home', compact('banners', 'categories','products','brands','menus','posts','coupons'));
    }
}

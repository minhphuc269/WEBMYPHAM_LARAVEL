<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //Tất cả sản phẩm
    public function index(Request $request)
{
    $query = Product::where('status', '=', 1);

    $this->priceFilter($query, $request);

    $this->sortBy($query, $request->input('sort_by', 'created-desc'));

    $list_product = $query->paginate(12);

    $list_product->appends($request->query()); //Phân trang lọc

    return view('frontend.product', compact('list_product'));
}

    
    private function getlistcategory($rowid)
    {
        $listcatid = [];

        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])->select("id")->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select("id")->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }
        return $listcatid;
    }
    //Sản phẩm theo danh mục
    public function category(Request $request, $slug)
    {
        $row = Category::where('slug', $slug)
            ->where('status', 1)
            ->firstOrFail();

        $listcatid = $this->getlistcategory($row->id);

        $query = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid);

        $this->priceFilter($query, $request);

        $this->sortBy($query, $request->input('sort_by', 'created-desc'));

        $list_product = $query->paginate(12);
        $list_product->appends($request->query()); //Phân trang lọc

        return view('frontend.product_category', compact('row', 'list_product'));
    }
    //Sản phẩm theo thương hiệu
    public function brand(Request $request, $slug)
    {
        $row = Brand::where('slug', $slug)
            ->where('status', '=', 1)
            ->firstOrFail();

        $query = Product::where('status', '=', 1)
            ->where('brand_id', $row->id);

        $this->priceFilter($query, $request);

        $this->sortBy($query, $request->input('sort_by', 'created-desc'));

        $list_product = $query->paginate(12);
        $list_product->appends($request->query()); //Phân trang lọc

        return view('frontend.product_brand', compact('row', 'list_product'));
    }
    //Sản phẩm giảm giá
    public function sale()
    {
        $list_product = Product::where([['status', '=', 1], ['pricesale', '>', 0]])
            ->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('frontend.product_flase_sale', compact('list_product'));
    }
    //Sản phẩm theo tìm kiếm
    public function search(Request $request, $search)
    {
        $query = Product::query();

        if (!empty($search)) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }
        $query->where('status', '=', 1);
        $this->priceFilter($query, $request);

        if ($request->has('sort_by')) {
            $this->sortBy($query, $request->input('sort_by'));
        }

        $list_product = $query->paginate(12);
        $count = $list_product->total();

        return view('frontend.product_search', compact('list_product', 'count', 'search'));
    }

    //Lọc theo giá
    private function priceFilter($query, $request)
    {
        if ($request->has('price_range')) {
            $priceRange = explode('-', $request->input('price_range'));
            $minPrice = (int) $priceRange[0];
            $maxPrice = (int) $priceRange[1];

            $query->where(function ($query) use ($minPrice, $maxPrice) {
                $query->where(function ($query) use ($minPrice, $maxPrice) {
                    $query->where('pricesale', '!=', null)
                        ->whereBetween('pricesale', [$minPrice, $maxPrice]);
                })->orWhere(function ($query) use ($minPrice, $maxPrice) {
                    $query->where('pricesale', null)
                        ->whereBetween('price', [$minPrice, $maxPrice]);
                });
            });
        }
    }
    //Sắp xếp
    private function sortBy($query, $sortType)
    {
        switch ($sortType) {
            case 'name:asc':
                $query->orderBy('name', 'asc');
                break;
            case 'name:desc':
                $query->orderBy('name', 'desc');
                break;
            case 'price-asc':
                $query->orderByRaw('COALESCE(pricesale, price) asc');
                break;
            case 'price-desc':
                $query->orderByRaw('COALESCE(pricesale, price) desc');
                break;
            case 'created-desc':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
                break;
        }
    }
    // Chi tiết sản phẩm
    public function product_detail($slug)
    {
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $listcatid = $this->getlistcategory($product->category_id);
        $list_product = Product::where([['status', '=', 1], ['id', '!=', $product->id]])
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        $brand = Brand::findOrFail($product->brand_id);
        $category = Category::findOrFail($product->category_id);
        $menus = Menu::where('position', 'mainmenu')->get();

        return view('frontend.product_detail', compact('product', 'list_product', 'brand', 'category', 'menus'));
    }
}

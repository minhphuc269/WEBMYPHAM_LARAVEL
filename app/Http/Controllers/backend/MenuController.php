<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateMenuRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class MenuController extends Controller
{

    public function index()
    {
        
        $list = Menu::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();
        $list_category = Category::where('status', '!=', '0')
        ->orderBy('created_at', 'DESC')
        ->select('id','name')
        ->get();
        $list_brand = Brand::where('status', '!=', '0')
        ->orderBy('created_at', 'DESC')
        ->select('id','name')
        ->get();
        $list_topic = Topic::where('status', '!=', '0')
        ->orderBy('created_at', 'DESC')
        ->select('id','name')
        ->get();
        $list_page = Post::where([['status', '!=', '0'],['type','=','page']])
        ->orderBy('created_at', 'DESC')
        ->select('id','title')
        ->get();

        return view('backend.menu.index', compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page'));
    }
    //Thùng rác
    public function trash()
    {
        $list = Menu::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'link', 'name', 'position', 'status')
            ->get();

        return view('backend.menu.trash', compact('list'));
    }

    public function store(Request $request)
    {
        //danh muc
        if (isset($request->createCategory)) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);

                    if ($category != null) {
                        $menu = new Menu();
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/' . $category->slug;
                        $menu->sort_order = 0;
                        
                        $menu->type = 'category';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = now();
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('success', 'Thêm Menu thành công.');
            } else {
                echo "khoong co";
            }
        }
        //thuong hieu
        if (isset($request->createBrand)) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu();
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/' . $brand->slug;
                        $menu->sort_order = 0;
                        
                        $menu->type = 'brand';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = now();
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('success', 'Thêm Menu thành công.');
            } else {
                echo "khoong co";
            }
        }
        //chu de
        if (isset($request->createTopic)) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu();
                        $menu->name = $topic->name;
                        $menu->link = 'chu-de/' . $topic->slug;
                        $menu->sort_order = 0;
                        
                        $menu->type = 'topic';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = now();
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                return redirect()->route('admin.menu.index')->with('success', 'Thêm Menu thành công.');
            } else {
                echo "khoong co";
            }
        }
        //trang don
        if (isset($request->createPage)) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([["id", "=", $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu();
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/' . $page->slug;
                        $menu->sort_order = 0;
                        
                        $menu->type = 'page';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = now();
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }
                return redirect()->route('admin.menu.index')->with('success', 'Thêm Menu thành công.');
            } else {
                echo "khoong co";
            }
        }
        //tuy lien ket
        if (isset($request->createCustom)) {
            if (isset($request->name,$request->link)) {
                $menu = new Menu();
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = 0;
                
                $menu->type = 'custome';
                $menu->position = $request->position;
                $menu->created_at = now();
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = $request->status;
                $menu->save();
            }
        }
        return redirect()->route('admin.menu.index')->with('success', 'Menu đã được thêm thành công.');
    }


    public function show(string $id)
    {
        $menu = Menu::with(['creator', 'updater', 'parent'])
            ->findOrFail($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        return view('backend.menu.show', compact("menu"));
    }


    public function edit(string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }

        return view('backend.menu.edit', compact("menu"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuRequest $request, string $id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->type = $request->type;
        $menu->position = $request->position;
        $menu->parent_id = $request->parent_id;
        $menu->sort_order = $request->sort_order;
        $menu->status = $request->status;
        $menu->updated_at = now();
        $menu->updated_by = Auth::id() ?? 1; //dang nhap

        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Cập nhật Menu thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $menu = menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->delete(); //xoa khoi csdl
        return redirect()->route('admin.menu.trash')->with('success', 'Đã xóa Menu vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $menu = menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $menu->status = $menu->status == 1 ? 2 : 1;
        $menu->updated_at = now();
        $menu->updated_by = Auth::id() ?? 1; //dang nhap
        $menu->save();

        return response()->json(['status' => $menu->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $menu = menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 0;
        $menu->updated_at = now();
        $menu->updated_by = Auth::id() ?? 1; //dang nhap
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Đã xóa Menu vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $menu = menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }
        $menu->status = 2;
        $menu->updated_at = now();
        $menu->updated_by = Auth::id() ?? 1; //dang nhap
        $menu->save();

        return redirect()->route('admin.menu.trash')->with('success', 'Đã khôi phục Menu.');
    }
}

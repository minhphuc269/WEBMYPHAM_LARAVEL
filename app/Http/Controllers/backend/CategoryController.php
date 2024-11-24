<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function index()
    {
        $list = Category::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }
        return view('backend.category.index', compact("list", "htmlparentid", "htmlsortorder"));
    }

    public function trash()
    {
        $list = Category::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();
        return view('backend.category.trash', compact("list"));
    }

    public function store(StoreCategoryRequest $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($category->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/categorys/'), $fileName);
                $category->image = $fileName;
            }
        }

        $category->status = $request->status;
        $category->slug = Str::slug($request->name, '-');
        $category->created_at = now();
        $category->created_by = Auth::id() ?? 1; //dang nhap

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Thêm danh mục thành công.');
    }


    public function show(string $id)
    {
        $category = Category::with(['creator', 'updater', 'parent', 'sortedAfter'])
            ->findOrFail($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        return view('backend.category.show', compact("category"));
    }

    public function edit(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $list = Category::where('status', '!=', '0')
            ->where('id', '!=', $id) // Loại trừ danh mục hiện tại
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'slug', 'status', 'sort_order')
            ->get();
        $htmlparentid = "";
        $htmlsortorder = "";
        foreach ($list as $row) {
            if ($category->parent_id == $row->id) {
                $htmlparentid .= "<option selected value='" . $row->id . "'>" . $row->name . "</option>";
            } else {
                $htmlparentid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
            if ($category->sort_order - 1 == $row->sort_order) {
                $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
            } else {
                $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
            }
        }
        return view('backend.category.edit', compact("list", "htmlparentid", "htmlsortorder", "category"));
    }

    public function update(UpdateCategoryRequest $request, string $id)
    {
        //cap nhat
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        //
        $category->name = $request->name;
        $category->slug = Str::slug($request->name, '-');
        $category->description = $request->description;
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($category->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/categorys/'), $fileName);
                $category->image = $fileName;
            }
        }

        $category->status = $request->status;
        $category->updated_at = now();
        $category->updated_by = Auth::id() ?? 1; //dang nhap

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Cập nhật danh mục thành công.');
    }


    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->delete(); //xoa khoi csdl
        return redirect()->route('admin.category.trash')->with('success', 'Đã xóa danh mục vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $category->status = $category->status == 1 ? 2 : 1;
        $category->updated_at = now();
        $category->updated_by = Auth::id() ?? 1; //dang nhap
        $category->save();

        return response()->json(['status' => $category->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 0;
        $category->updated_at = now();
        $category->updated_by = Auth::id() ?? 1; //dang nhap
        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Đã xóa danh mục vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }
        $category->status = 2;
        $category->updated_at = now();
        $category->updated_by = Auth::id() ?? 1; //dang nhap
        $category->save();

        return redirect()->route('admin.category.trash')->with('success', 'Đã khôi phục danh mục.');
    }
}

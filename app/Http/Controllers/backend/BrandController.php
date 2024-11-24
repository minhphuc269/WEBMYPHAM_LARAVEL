<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class BrandController extends Controller
{

    public function index()
    {
        $list = Brand::where("status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->select("id", "image", "name", "slug", "status","sort_order")
            ->get(); 

        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }

        return view("backend.brand.index", compact('list', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Brand::where("status", "=", 0)  // status=0
            ->orderBy("created_at", "DESC")
            ->select("id", "image", "name", "slug", "status")
            ->get(); 

        return view("backend.brand.trash", compact('list'));
    }

    public function store(StoreBrandRequest $request)
    {
        $brand = new Brand();
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name, '-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($brand->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/brands/'), $fileName);
                $brand->image = $fileName;
            }
        }


        $brand->status = $request->status;
        $brand->created_at = now();
        $brand->created_by = Auth::id() ?? 1;

        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Thương hiệu đã được tạo thành công.');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::with(['creator', 'updater'])
        ->findOrFail($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        return view('backend.brand.show', compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $list = Brand::where("status", "!=", 0)
        ->orderBy("created_at", "DESC")
        ->select("id", "image", "name", "slug", "status","sort_order")
        ->get(); 

    $htmlsortorder = "";
    foreach ($list as $row) {
        if($brand->sort_order==$row->sort_order)
        { 
            $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }
        else{
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }
    }

    return view("backend.brand.edit", compact('list','brand', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, string $id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->name = $request->name;
        $brand->slug = Str::slug($request->name, '-');
        $brand->description = $request->description;
        $brand->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($brand->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/brands/'), $fileName);
                $brand->image = $fileName;
            }
        }
        $brand->status = $request->status;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1;

        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Cập nhật thương hiệu thành công.');
    }
   
    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $brand = brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->delete(); //xoa khoi csdl
        return redirect()->route('admin.brand.trash')->with('success', 'Đã xóa thương hiệu vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $brand = brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $brand->status = $brand->status == 1 ? 2 : 1;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1; //dang nhap
        $brand->save();

        return response()->json(['status' => $brand->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 0;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1; //dang nhap
        $brand->save();

        return redirect()->route('admin.brand.index')->with('success', 'Đã xóa thương hiệu vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $brand = Brand::find($id);
        if ($brand == null) {
            return redirect()->route('admin.brand.index');
        }
        $brand->status = 2;
        $brand->updated_at = now();
        $brand->updated_by = Auth::id() ?? 1; //dang nhap
        $brand->save();

        return redirect()->route('admin.brand.trash')->with('success', 'Đã khôi phục thương hiệu.');
    }
}

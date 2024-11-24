<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Http\Requests\UpdateBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BannerController extends Controller
{
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'link', 'position','status')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . $row->name . "'>" . $row->name . "</option>";
        }
        return view("backend.banner.index", compact('list', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Banner::where('status', '=', '0') // status=0
            ->orderBy('created_at', 'DESC')
            ->select('id', 'image', 'name', 'link', 'position','status')
            ->get();
        return view("backend.banner.trash", compact('list'));
    }

    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner();
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->description = $request->description;
        $banner->position = $request->position;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($banner->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/banners/'), $fileName);
                $banner->image = $fileName;
                $banner->status = $request->status;
                $banner->created_at = now();
                $banner->created_by = Auth::id() ?? 1; //dang nhap
        
                $banner->save();
        
                return redirect()->route('admin.banner.index')->with('success', 'Thêm Banner thành công!');
            }
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $banner = Banner::with(['creator', 'updater'])
        ->findOrFail($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        return view('backend.banner.show', compact("banner"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $list = Banner::where('status', '!=', '0')
        ->orderBy('created_at', 'DESC')
        ->select('id', 'image', 'name', 'link', 'position','status')
        ->get();
    $htmlsortorder = "";
    foreach ($list as $row) {
        if($banner->position==$row->position)
        {
            $htmlsortorder .= "<option selected value='" . $row->position . "'>" . $row->position . "</option>";
        }
        else
        {
            $htmlsortorder .= "<option value='" . $row->name . "'>" . $row->name . "</option>";

        }
    }
    return view("backend.banner.edit", compact('list','banner', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBannerRequest $request, string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->description = $request->description;
        $banner->position = $request->position;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($banner->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/banners/'), $fileName);
                $banner->image = $fileName;
                $banner->status = $request->status;
                $banner->updated_at = now();
                $banner->updated_by = Auth::id() ?? 1; //dang nhap
        
                $banner->save();
        
                return redirect()->route('admin.banner.index')->with('success', 'Cập nhật Banner thành công!');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->delete(); //xoa khoi csdl
        return redirect()->route('admin.banner.trash')->with('success', 'Đã xóa Banner vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $banner->status = $banner->status == 1 ? 2 : 1;
        $banner->updated_at = now();
        $banner->updated_by = Auth::id() ?? 1; //dang nhap
        $banner->save();

        return response()->json(['status' => $banner->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 0;
        $banner->updated_at = now();
        $banner->updated_by = Auth::id() ?? 1; //dang nhap
        $banner->save();

        return redirect()->route('admin.banner.index')->with('success', 'Đã xóa Banner vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }
        $banner->status = 2;
        $banner->updated_at = now();
        $banner->updated_by = Auth::id() ?? 1; //dang nhap
        $banner->save();

        return redirect()->route('admin.banner.trash')->with('success', 'Đã khôi phục Banner.');
    }
}

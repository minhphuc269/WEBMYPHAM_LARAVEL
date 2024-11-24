<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Delivery;
use App\Models\District;
use App\Models\Town;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DeliveryController extends Controller
{
    public function getDistricts($cityId)
    {
        $districts = District::where('matp', $cityId)->get();
        return response()->json($districts);
    }

    public function getTowns($districtId)
    {
        $towns = Town::where('maqh', $districtId)->get();
        return response()->json($towns);
    }


    // Hiển thị danh sách phí vận chuyển
    public function index()
    {
        $cities = City::all();
        $districts = District::all();
        $towns = Town::all();
        $list = Delivery::where('status', '!=', '0')->with(['city', 'district', 'town'])->get();

        return view('backend.delivery.index', compact('cities', 'districts', 'towns', 'list'));
    }


    // Lưu phí vận chuyển mới
    public function store(Request $request)
    {
        $delivery = new delivery();
        $delivery->id_city = $request->id_city;
        $delivery->id_district = $request->id_district;
        $delivery->id_town = $request->id_town;
        $delivery->feeship = $request->feeship;

        $delivery->status = 1;
        $delivery->created_at = now();
        $delivery->created_by = Auth::id() ?? 1; //dang nhap

        $delivery->save();

        return redirect()->route('admin.delivery.index')->with('success', 'Thêm phí vận chuyển thành công!');
    }
    // Hiển thị danh sách đã xóa
    public function trash()
    {
        $list = Delivery::where('status', '!=', '0')->with(['city', 'district', 'town'])->get();

        return view('backend.delivery.trash', compact('list'));
    }

    // Hiển thị chi tiết phí vận chuyển
    public function show($id)
    {
        $delivery = Delivery::with(['creator', 'updater', 'city', 'district', 'town'])->findOrFail($id);
        if ($delivery == null) {
            return redirect()->route('admin.delivery.index');
        }
        return view('backend.delivery.show', compact("delivery"));
    }

    public function updateFeeship(Request $request, $id)
{
    $request->validate([
        'feeship' => 'required|numeric|min:0',
    ]);

    $delivery = Delivery::find($id);
    if ($delivery) {
        $delivery->feeship = $request->feeship;
        $delivery->save();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Cập nhật thất bại!']);
}


    // Xóa tạm phí vận chuyển
    public function delete($id)
    {
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        return redirect()->route('admin.delivery.index')->with('success', 'Xóa phí vận chuyển thành công!');
    }

    // Khôi phục phí vận chuyển đã xóa
    public function restore($id)
    {
        $delivery = Delivery::onlyTrashed()->findOrFail($id);
        $delivery->restore();

        return redirect()->route('admin.delivery.trash')->with('success', 'Khôi phục phí vận chuyển thành công!');
    }

    // Xóa vĩnh viễn phí vận chuyển
    public function destroy($id)
    {
        $delivery = Delivery::onlyTrashed()->findOrFail($id);
        $delivery->forceDelete();

        return redirect()->route('admin.delivery.trash')->with('success', 'Xóa phí vận chuyển vĩnh viễn thành công!');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $delivery = delivery::find($id);
        if ($delivery == null) {
            return redirect()->route('admin.delivery.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $delivery->status = $delivery->status == 1 ? 2 : 1;
        $delivery->updated_at = now();
        $delivery->updated_by = Auth::id() ?? 1; //dang nhap
        $delivery->save();

        return response()->json(['status' => $delivery->status], 200);
    }
}

<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserController extends Controller
{

    public function index()
    {
        $list = User::where("status", "!=", 0)
            ->orderBy("created_at", "DESC")
            ->select("id", "image", "name", "email", "phone", "roles", "status")
            ->get();

        return view('backend.user.index', compact('list'));
    }
    //thùng rác
    public function trash()
    {
        $list = User::where("status", "=", 0)
            ->orderBy("created_at", "DESC")
            ->select("id", "image", "name", "email", "phone", "roles", "status")
            ->get();

        return view('backend.user.trash', compact('list'));
    }


    public function create()
    {

        return view('backend.user.create');
    }


    public function store(StoreUserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password); // Mã hóa mật khẩu
        $user->roles = $request->roles;
        $user->gender = $request->gender;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($user->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/users/'), $fileName);
                $user->image = $fileName;
            }
        }

        $user->status = $request->status;
        $user->created_at = now();
        $user->created_by = Auth::id() ?? 1;

        $user->save();

        return redirect()->route('admin.user.create')->with('success', 'Thêm thành viên thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('backend.user.show', compact('user'));
    }


    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password); // Mã hóa mật khẩu
        $user->roles = $request->roles;
        $user->gender = $request->gender;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($user->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/users/'), $fileName);
                $user->image = $fileName;
            }
        }

        $user->status = $request->status;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1;

        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Cập nhật thành viên thành công.');
    }

    //Xóa vĩnh viễn
    public function destroy($id)
    {
        $user = user::find($id);

        if ($user == null) {
            return redirect()->route('admin.user.index')->with('error', 'Thành viên không tồn tại.');
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Thành viên đã được xóa vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $user->status = $user->status == 1 ? 2 : 1;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1; //dang nhap
        $user->save();

        return response()->json(['status' => $user->status], 200);
    }
    //Xóa tạm thời
    public function delete($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index')->with('error', 'Thành viên không tồn tại.');
        }
        $user->status = 0;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1; // sử dụng ID người dùng đã đăng nhập
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Đã xóa thành viên vào thùng rác.');
    }

    //Khôi phục
    public function restore($id)
    {
        $user = user::find($id);
        if ($user == null) {
            return redirect()->route('admin.user.index');
        }
        $user->status = 2;
        $user->updated_at = now();
        $user->updated_by = Auth::id() ?? 1; //dang nhap
        $user->save();

        return redirect()->route('admin.user.trash')->with('success', 'Đã khôi phục thành viên.');
    }
}
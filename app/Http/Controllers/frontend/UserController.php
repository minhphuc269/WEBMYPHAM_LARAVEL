<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage ;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class UserController extends Controller
{
    public function index()
    {
       

        // Lấy thông tin người dùng đã đăng nhập
        $user = Auth::user();

        // Trả về view thông tin tài khoản với dữ liệu người dùng
        return view('frontend.profile', compact('user'));
    }
    public function showChangePasswordForm()
    {
        return view('frontend.change-password');
    }

    // Xử lý logic đổi mật khẩu
    public function changePassword(Request $request)
{
    // Validate các trường thông tin
    $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:6',
        'confirm_password' => 'required|same:new_password',
    ]);

    // Kiểm tra mật khẩu hiện tại
    $user = Auth::user();
    if (!Hash::check($request->current_password, $user->password)) {
        return back()->with('error', 'Mật khẩu hiện tại không chính xác');
    }

    // Cập nhật mật khẩu mới
    $user->password = Hash::make($request->new_password);
    
    // Cập nhật và lưu người dùng
    $user->save();

    return redirect()->route('user.profile')->with('success', 'Đổi mật khẩu thành công');
}
public function updateImage(Request $request, $id)
{
    $user = User::findOrFail($id);

    // Kiểm tra xem tệp ảnh có tồn tại không
    if ($request->hasFile('image')) {
        $exten = $request->image->getClientOriginalExtension();
        if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
            // Tạo tên tệp ảnh dựa trên tên người dùng
            $fileName = Str::slug($user->name, '-') . '.' . $exten;

            // Di chuyển tệp ảnh đến thư mục mong muốn
            $request->image->move(public_path('images/users/'), $fileName);

            // Cập nhật tên ảnh vào cơ sở dữ liệu
            $user->image = $fileName;
            $user->save(); // Lưu thay đổi
            return redirect()->back()->with('success', 'Cập nhật ảnh thành công!');
        } else {
            return redirect()->back()->with('error', 'Định dạng tệp không hợp lệ!');
        }
    } else {
        return redirect()->back()->with('error', 'Không có tệp ảnh nào được chọn!');
    }
}

public function update(Request $request, $id)
{
    // Xác thực dữ liệu đầu vào
    $validator = FacadesValidator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:user,email,' . $id, // Thay đổi 'users' thành 'user'
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        'gender' => 'required|in:male,female',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Tìm người dùng theo ID
    $user = User::findOrFail($id);

    // Cập nhật thông tin người dùng
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->phone = $request->input('phone');
    $user->address = $request->input('address');
    $user->gender = $request->input('gender');
    
    // Lưu thay đổi
    $user->save();

    // Đưa ra thông báo thành công
    return redirect()->route('user.profile')->with('success', 'Thông tin tài khoản đã được cập nhật thành công!');
}



    
}

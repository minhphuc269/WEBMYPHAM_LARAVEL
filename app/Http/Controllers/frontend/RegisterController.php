<?php
namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        // Kiểm tra xem có thông tin nào chưa được điền
        if (empty($request->email) || empty($request->name) || empty($request->password) || empty($request->gender)) {
            return redirect()->back()->withInput()->with('message', 'Không thể đăng ký. Vui lòng điền đầy đủ thông tin của bạn.');
        }

        // Kiểm tra xác nhận mật khẩu
        if ($request->password !== $request->password_confirmation) {
            return redirect()->back()->withInput()->with('message', 'Mật khẩu không đúng. Vui lòng kiểm tra lại mật khẩu.');
        }

        // Kiểm tra xem email đã tồn tại chưa
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->withInput()->with('message', 'Tài khoản này đã tồn tại.');
        }

        // Kiểm tra độ dài mật khẩu
        if (strlen($request->password) < 6) {
            return redirect()->back()->withInput()->with('message', 'Mật khẩu phải có ít nhất 6 ký tự.');
        }

        // Kiểm tra ký tự thường
        if (!preg_match('/[a-z]/', $request->password)) {
            return redirect()->back()->withInput()->with('message', 'Mật khẩu phải chứa ít nhất một ký tự thường.');
        }

        // Kiểm tra ký tự hoa
        if (!preg_match('/[A-Z]/', $request->password)) {
            return redirect()->back()->withInput()->with('message', 'Mật khẩu phải chứa ít nhất một ký tự hoa.');
        }

        // Kiểm tra ký tự đặc biệt
        if (!preg_match('/[\W_]/', $request->password)) {
            return redirect()->back()->withInput()->with('message', 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt.');
        }

        // Validate input data
        $request->validate([
            'email' => 'required|email|unique:user,email',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'nullable|string|max:15',
            'gender' => 'required|in:0,1',
            'address' => 'nullable|string|max:255',
        ]);

        // Hash the password
        $hashedPassword = Hash::make($request->password);
        
        try {
            // Create a new user
            User::create([
                'email' => $request->email,
                'name' => $request->name,
                'password' => $hashedPassword,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
                'roles' => 'customer',
                'status' => 1,
                'created_by' => auth()->id(),
                'updated_by' => auth()->id(),
            ]);
        } catch (\Throwable $th) {
            // Handle error
            return redirect()->back()->withErrors(['error' => 'Đã có lỗi xảy ra.'])->withInput();
        }

        // Redirect to login page with success message
        return redirect()->route('website.getlogin')->with('message', 'Đăng ký thành công!');
    }
}

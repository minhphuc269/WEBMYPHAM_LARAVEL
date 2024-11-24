<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomerResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Mail\ForgotPassword;
class AuthController extends Controller
{
    public function getlogin()
    {
        return view('login');
    }

    public function dologin(Request $request)
    {
        // Kiểm tra xem có dữ liệu trong các trường không
        if (empty($request->username) || empty($request->password)) {
            return redirect()->route('website.getlogin')->withInput()->with('message', 'Không thể đăng nhập. Vui lòng điền đầy đủ thông tin của bạn.');
        }
    
        // Kiểm tra độ dài tên đăng nhập
        if (strlen($request->username) < 6) {
            return redirect()->route('website.getlogin')->withInput()->with('message', 'Tên đăng nhập phải có ít nhất 6 ký tự.');
        }
    
        // Kiểm tra độ dài mật khẩu
        if (strlen($request->password) < 6) {
            return redirect()->route('website.getlogin')->withInput()->with('message', 'Mật khẩu phải có ít nhất 6 ký tự.');
        }
    
        // Thiết lập thông tin đăng nhập
        $credentials = [
            'password' => $request->password,
            'status' => 1
        ];
    
        // Kiểm tra xem username có phải là email không
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $request->username;
        } else {
            $credentials['username'] = $request->username;
        }
    
        // Đăng nhập
        if (Auth::attempt($credentials)) {
            return redirect()->route('site.home');
        } else {
            // Giữ lại giá trị username/email nhưng reset mật khẩu
            return redirect()->route('website.getlogin')
                ->withInput(['password' => '']) // Reset password, giữ username/email
                ->with('message', 'Đăng nhập không thành công');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('site.home');
    }
}

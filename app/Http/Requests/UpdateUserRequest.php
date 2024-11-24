<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits_between:10,11',
            'password' => [
                'required',
                'min:6',
                'regex:/[a-z]/',
                'regex:/[A-Z]/',
                'regex:/[\W_]/',
            ],
            'password_re' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        $messages = [
            'name.required' => 'Họ tên không được để trống!',
            'email.required' => 'Email không được để trống!',
            'email.email' => 'Email không đúng định dạng!',
            'phone.required' => 'Số điện thoại không được để trống!',
            'phone.digits_between' => 'Số điện thoại phải có từ 10 đến 11 chữ số!',
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự!',
            'password.regex' => 'Mật khẩu không đủ yêu cầu!',
            'password_re.required' => 'Xác nhận mật khẩu không được để trống!',
            'password_re.same' => 'Xác nhận mật khẩu không khớp!',
        ];

        // Thêm thông báo chi tiết cho từng trường hợp
        if (!$this->request->has('password') || strlen($this->request->get('password')) < 6) {
            $messages['password.regex'] = 'Mật khẩu phải có ít nhất 6 ký tự!';
        } else {
            if (!preg_match('/[a-z]/', $this->request->get('password'))) {
                $messages['password.regex'] = 'Mật khẩu phải chứa ít nhất một ký tự thường!';
            }
            if (!preg_match('/[A-Z]/', $this->request->get('password'))) {
                $messages['password.regex'] = 'Mật khẩu phải chứa ít nhất một ký tự hoa!';
            }
            if (!preg_match('/[\W_]/', $this->request->get('password'))) {
                $messages['password.regex'] = 'Mật khẩu phải chứa ít nhất một ký tự đặc biệt!';
            }
        }

        return $messages;
    }
}


<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\FrontendContact;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function index()
    {
        // Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng đến trang login
        if (!Auth::check()) {
            return redirect()->route('website.dologin');
        }

        // Nếu đã đăng nhập, tiếp tục thực hiện logic lấy danh sách contact
        $contacts = Contact::where('user_id', Auth::id())->get();
        return view('frontend.contact', compact('contacts'));
    }

    public function send_contact(FrontendContact $request)
    {
        $customer = Auth::user();
    
        $contact = new Contact();
        $contact->user_id = $customer->id;
        $contact->name = $customer->name;
        $contact->phone = $customer->phone;
        $contact->email = $customer->email;
        $contact->title = $request->input('title');
        $contact->content = $request->input('content');
        $contact->created_at = now();
        $contact->status = 1;
        $contact->save();
    
        return redirect()->route('site.contact')->with('success', 'Bạn đã gửi tin nhắn thành công');
    }
    
}

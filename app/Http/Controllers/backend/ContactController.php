<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Contact::where("contact.status", "!=", 0)

        ->orderBy("contact.created_at", "DESC") // mới nhất lên đầu
        ->select("contact.id", "contact.name", "contact.email", "contact.phone", "contact.title","status","reply")
        ->get();

    return view('backend.contact.index', compact("list"));
    }
// thùng rác
    public function trash()
    {
        $list = Contact::where("contact.status", "=", 0)

        ->orderBy("contact.created_at", "DESC") // mới nhất lên đầu
        ->select("contact.id", "contact.name", "contact.email", "contact.phone", "contact.title","status")
        ->get();

    return view('backend.contact.trash', compact("list"));
    }
   
    public function show(string $id)
    {
        $contact = Contact::with(['creator', 'updater'])
        ->findOrFail($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        return view('backend.contact.show', compact("contact"));
    }

    //Trả lời
    public function reply(string $id)
    {
        $contact = Contact::findOrFail($id);

        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        
        return view('backend.contact.reply', compact("contact"));
    }

    // Lưu phản hồi vào cơ sở dữ liệu
    public function sendReply(Request $request, string $id)
    {
        $request->validate([
            'reply' => 'required|string|max:2000',
        ]);

        $contact = Contact::findOrFail($id);

        // Lưu nội dung trả lời vào cơ sở dữ liệu
        $contact->reply = $request->reply;
        $contact->status = 1; 
        $contact->save();

        return redirect()->route('admin.contact.index')->with('success', 'Đã lưu phản hồi thành công.');
    }
    
    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $contact = contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->delete(); //xoa khoi csdl
        return redirect()->route('admin.contact.trash')->with('success', 'Đã xóa contact vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $contact = contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $contact->status = $contact->status == 1 ? 2 : 1;
        $contact->updated_at = now();
        $contact->updated_by = Auth::id() ?? 1; //dang nhap
        $contact->save();

        return response()->json(['status' => $contact->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $contact = contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 0;
        $contact->updated_at = now();
        $contact->updated_by = Auth::id() ?? 1; //dang nhap
        $contact->save();

        return redirect()->route('admin.contact.index')->with('success', 'Đã xóa contact vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $contact = contact::find($id);
        if ($contact == null) {
            return redirect()->route('admin.contact.index');
        }
        $contact->status = 2;
        $contact->updated_at = now();
        $contact->updated_by = Auth::id() ?? 1; //dang nhap
        $contact->save();

        return redirect()->route('admin.contact.trash')->with('success', 'Đã khôi phục contact.');
    }
}


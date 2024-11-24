<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('status', '!=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'slug','status','sort_order')
            ->get();
        $htmlsortorder = "";
        foreach ($list as $row) {
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }
        return view("backend.topic.index", compact('list', 'htmlsortorder'));
    }
    public function trash()
    {
        $list = Topic::where('status', '=', '0')
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name', 'slug','status','sort_order')
            ->get();
        return view("backend.topic.trash", compact('list'));
    }

    public function store(StoreTopicRequest $request)
    {
        $topic = new Topic();
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name, '-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($topic->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/topics/'), $fileName);
                $topic->image = $fileName;
            }
        }

        $topic->status = $request->status;
        $topic->created_at = now();
        $topic->created_by = Auth::id() ?? 1; //dang nhap

        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Thêm chủ đề thành công!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $topic = Topic::with(['creator', 'updater',  'sortedAfter'])
        ->findOrFail($id);
    if ($topic == null) {
        return redirect()->route('admin.topic.index');
    }
    return view('backend.topic.show', compact("topic"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $list = Topic::where('status', '!=', '0')
        ->orderBy('created_at', 'DESC')
        ->select('id', 'name', 'slug','status','sort_order')
        ->get();
    $htmlsortorder = "";
    foreach ($list as $row) {
        if($topic->sort_order==$row->sort_order){
            $htmlsortorder .= "<option selected value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";
        }
        else{
            $htmlsortorder .= "<option value='" . ($row->sort_order + 1) . "'>" . $row->name . "</option>";

        }

    }
    return view("backend.topic.edit", compact('list','topic', 'htmlsortorder'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTopicRequest $request, string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->name = $request->name;
        $topic->slug = Str::slug($request->name, '-');
        $topic->description = $request->description;
        $topic->sort_order = $request->sort_order;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($topic->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/topics/'), $fileName);
                $topic->image = $fileName;
            }
        }

        $topic->status = $request->status;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1; //dang nhap

        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Cập nhật chủ đề thành công.');
    }

   
    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->delete(); //xoa khoi csdl
        return redirect()->route('admin.topic.trash')->with('success', 'Đã xóa chủ đề vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $topic->status = $topic->status == 1 ? 2 : 1;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1; //dang nhap
        $topic->save();

        return response()->json(['status' => $topic->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 0;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1; //dang nhap
        $topic->save();

        return redirect()->route('admin.topic.index')->with('success', 'Đã xóa chủ đề vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.topic.index');
        }
        $topic->status = 2;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1; //dang nhap
        $topic->save();

        return redirect()->route('admin.topic.trash')->with('success', 'Đã khôi phục chủ đề.');
    }
}

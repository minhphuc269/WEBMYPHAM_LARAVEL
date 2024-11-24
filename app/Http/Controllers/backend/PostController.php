<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $list = Post::where("post.status", "!=", 0)
            ->leftjoin("topic", "post.topic_id", "=", "topic.id")
            ->orderBy("post.created_at", "DESC") // mới nhất lên đầu
            ->select("post.id", "post.title", "post.type", "post.image", "topic.name as topicname", "post.status")
            ->get();

        return view('backend.post.index', compact("list"));
    }

    //Thùng rác
    public function trash()
    {
        $list = Post::where("post.status", "=", 0)
            ->leftjoin("topic", "post.topic_id", "=", "topic.id")
            ->orderBy("post.created_at", "DESC") // mới nhất lên đầu
            ->select("post.id", "post.title", "post.type", "post.image", "topic.name as topicname", "post.status")
            ->get();

        return view('backend.post.trash', compact("list"));
    }

    public function create()
    {
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmltopicid = "";
        foreach ($list_topic as $row) {
            $htmltopicid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
        }
        return view('backend.post.create', compact("htmltopicid"));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;
        
        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($post->name, '-') . '.' . $exten;
                $request->image->move(public_path('images/posts/'), $fileName);
                $post->image = $fileName;
            }
        }

        $post->status = $request->status;
        $post->slug = Str::slug($request->title, '-');
        $post->created_at = now();
        $post->created_by = Auth::id() ?? 1; //dang nhap

        $post->save();

        return redirect()->route('admin.post.create')->with('success', 'Thêm bài viết thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['parentTopic', 'creator', 'updater'])
            ->findOrFail($id);

        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        return view('backend.post.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->get();
        $htmltopicid = "";
        foreach ($list_topic as $row) {
            if ($post->topic_id == $row->id) {
                $htmltopicid .= "<option selected value='" . $row->id . "'>" . $row->name . "</option>";
            } else {
                $htmltopicid .= "<option value='" . $row->id . "'>" . $row->name . "</option>";
            }
        }
        return view('backend.post.edit', compact("htmltopicid", "post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->detail = $request->detail;
        $post->topic_id = $request->topic_id;
        $post->type = $request->type;

        // Upload file
        if ($request->hasFile('image')) {
            $exten = $request->image->getClientOriginalExtension();
            if (in_array($exten, ["png", "jpg", "gif", "webp"])) {
                $fileName = Str::slug($post->title, '-') . '.' . $exten;
                $request->image->move(public_path('images/posts/'), $fileName);
                $post->image = $fileName;
            }
        }

        $post->status = $request->status;
        $post->slug = Str::slug($request->title, '-');
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1; //dang nhap

        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Cập nhật bài viết thành công.');
    }

    // Xóa vĩnh viễn
    public function destroy(string $id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->delete(); //xoa khoi csdl
        return redirect()->route('admin.post.trash')->with('success', 'Đã xóa bài viết vĩnh viễn.');
    }
    // cập nhật trạng thái
    public function status($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        // Đảo ngược trạng thái từ 1 sang 2 và ngược lại
        $post->status = $post->status == 1 ? 2 : 1;
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1; //dang nhap
        $post->save();

        return response()->json(['status' => $post->status], 200);
    }
    //Xóa vào thùng rác
    public function delete($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 0;
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1; //dang nhap
        $post->save();

        return redirect()->route('admin.post.index')->with('success', 'Đã xóa bài viết vào thùng rác.');
    }
    //khôi phục
    public function restore($id)
    {
        $post = post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }
        $post->status = 2;
        $post->updated_at = now();
        $post->updated_by = Auth::id() ?? 1; //dang nhap
        $post->save();

        return redirect()->route('admin.post.trash')->with('success', 'Đã khôi phục bài viết.');
    }
}

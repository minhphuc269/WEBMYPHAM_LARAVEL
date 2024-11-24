<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post_all()
    {

        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post']])
            ->orderBy('created_at', 'asc')
            ->paginate(6);
        //Danh sách chủ đề
        $list_topic = Topic::where('status', '=', 1)
            ->orderBy('sort_order', 'ASC')
            ->select('name', 'slug')
            ->get();


        return view('frontend.post_all', compact('list_post', 'list_topic'));
    }
    public function post_topic($slug)
    {

        $topic = Topic::where('slug', '=', $slug)->firstOrFail();
        //Danh sách bài viết theo chủ đề
        $list_post = Post::where([['status', '=', 1], ['topic_id', '=', $topic->id]])
            ->orderBy('created_at', 'asc')
            ->paginate(6);
        //Danh sách chủ đề
        $list_topic = Topic::where('status', '=', 1)
            ->orderBy('sort_order', 'ASC')
            ->select('name', 'slug')
            ->get();

        return view('frontend.post_topic', compact('list_post', 'list_topic', 'topic'));
    }

    public function post_detail($slug)
    {
        $post = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();
        $list_topic = Topic::where('status', '=', 1)
            ->orderBy('sort_order', 'ASC')
            ->select('name', 'slug')
            ->get();

        //Danh sách bài viết cùng chủ đề
        $mod_post_topic = Post::where([['status', '=', 1], ['id', '!=', $post->id], ['topic_id', '=', $post->topic_id]])
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        return view('frontend.post_detail', compact('post', 'list_topic',  'mod_post_topic'));
    }
    public function page_detail($slug)
    {
        $page = Post::where([['status', '=', 1], ['type', '=', 'page'], ['slug', '=', $slug]])
            ->firstOrFail();
        $list_page = Post::where([['type', '=', 'page'], ['status', '=', 1], ['id', '!=', $page->id]])
            ->orderBy('created_at', 'desc')
            ->get();
        return view('frontend.page_detail', compact('page', 'list_page'));
    }
}

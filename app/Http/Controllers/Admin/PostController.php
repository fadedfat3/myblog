<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;
use App\Http\Request\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')
                       ->paginate(config('myblog.posts_per_page'));
        return view('admin.post.index', compact($posts));
    }

    public function create()
    {
        $post = [
            'title' => '文章标题',
            'content' => '文章内容',
            'published_at' => Carbon::now()
        ];
        return view('admin.post.create_update', compact($post));
    }

    public function store(PostRequest $req)
    {
        $titel = $req->input('title');
        $content = $req->input('content');
        $published_at = $req->input('published_at') ? $req->input('published_at') : Carbon::now();

        return true;
    }

    public function update($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('admin.post.create_update', compact($post));
    }
}

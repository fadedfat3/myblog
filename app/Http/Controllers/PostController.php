<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;
class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())->orderBy('published_at', 'desc')
                       ->paginate(config('myblog.posts_per_page'));
        return view('post.index', ['posts' => $posts]);
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('post.detail', ['post' => $post]);
    }
}

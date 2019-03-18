<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('published_at', '<=', Carbon::now())
            ->orderBy('published_at', 'desc')
            ->paginate(config('myblog.posts_per_page'));

        return view('home.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('home.post', ['post' => $post]);
    }
}
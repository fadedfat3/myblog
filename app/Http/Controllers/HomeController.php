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
            ->where('is_draft', 0)
            ->orderBy('published_at', 'desc')
            ->paginate(config('myblog.posts_per_page'));

        return view('home.index', compact('posts'));
    }

    public function show($id)
    {
        
        $post = Post::where('id', $id)->firstOrFail();
        $time = $post->published_at;
        $nextPost = Post::where('published_at', '<' ,$time)->orderBy('published_at', 'desc')->first() ;
        $prePost = Post::where('published_at', '>', $time)->orderBy('published_at', 'asc')->first();
        
        return view('home.post', ['post' => $post, 'next' => $nextPost, 'pre' => $prePost]);
    }

    public static function getThumbs($id)
    {   
        $post = Post::find($id);
        return $post->thumbs;
    }

    public static function addThumbs(Request $req)
    {
        $post = Post::find($req->input('id'));
        $post->increment('thumbs');
        $post->save();
        return back();
    }

    
}
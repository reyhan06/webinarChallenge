<?php

namespace App\Http\Controllers;

use Auth;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::get(['status']);
        return view('dashboard', compact('posts'));
    }

    public function home()
    {
        $posts = Post::select('title', 'author', 'slug', 'thumbnail', 'excerpt', 'published_at')->where('status', 1)->paginate(6);
        return view('home', compact('posts'));
    }

    public function showPost($slug)
    {
        $post = Post::slug($slug);
        if (!Auth::check() && !$post->status) abort(404);
        return view('post-show', compact('post'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "status" => "Blog",
            "title" => "Blog",
            // "posts" => Post::all()
            "posts" =>  Post::latest()->filter(request(['cari', 'category', 'authors']))->get()
        ]);
    }
    public function show(post $post)
    {
        return view('post', [
            "status" => "Blog",
            "title" => "Single Post",
            "Post" => $post
        ]);
    }
}

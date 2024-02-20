<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('posts', [
            "title" => "Blog",
            "status1" => "",
            "status2" => "active",
            "status3" => "",
            "posts" => Post::all()
        ]);
    }
    public function show($slug)
    {
        return view('post', [
            "title" => "Single Post",
            "status1" => "",
            "status2" => "",
            "status3" => "",
            "Post" => Post::find($slug)
        ]);
    }
}

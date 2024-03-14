<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\catagory;
use App\Models\User;

class PostController extends Controller
{
    public function index()
    {
        $title = 'Blog';
        if (request('category')) {
            $category = catagory::firstWhere('slug', request('category'));
            $title = $category->name;
        }
        if (request('authors')) {
            $authors = User::firstWhere('username', request('authors'));
            $title = "Author Posts :" . $authors->name;
        }
        return view('posts', [
            "status" => "Blog",
            "title" => "$title",
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

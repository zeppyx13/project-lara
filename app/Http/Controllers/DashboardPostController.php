<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\catagory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.posts.index', [
            "title" => "Dashboard",
            "status" => 'Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            "title" => "Create Post",
            "status" => 'Posts',
            'category' => catagory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required|max:40|min:2',
            'slug' => 'required|unique:posts',
            'catagory_id' => 'required',
            'body' => 'required|min:2'
        ]);
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body, 100));
        Post::create($validateData);
        return redirect('dashboard/posts/')->with('success', 'New Post Has Beend Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.detail', [
            'posts' => $post,
            "status" => 'Posts',
            "title" => "Detail Post"
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return redirect('dashboard/posts/')->with('delete', 'Post Has Beend Deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

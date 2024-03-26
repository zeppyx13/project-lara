<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\catagory;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'title' => 'required|max:50|min:2',
            'slug' => 'required|unique:posts',
            'catagory_id' => 'required',
            'images' => 'image|file|max:5120',
            'body' => 'required|min:2'
        ]);
        if ($request->file('images')) {
            $validateData['images'] = $request->file('images')->store('post-images');
        }
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
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            "title" => "Create Post",
            "status" => 'Posts',
            'posts' => $post,
            'category' => catagory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post)
    {
        $rules = [
            'title' => 'required|max:50|min:2',
            'catagory_id' => 'required',
            'images' => 'image|file|max:5120',
            'body' => 'required|min:2'
        ];

        if ($request->slug != $post) {
            $rules['slug'] = 'required|unique:posts';
        }
        $validateData = $request->validate($rules);
        if ($request->file('images')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['images'] = $request->file('images')->store('post-images');
        }
        $validateData['user_id'] = auth()->user()->id;
        $validateData['excerpt'] = Str::limit(strip_tags($request->body, 100));
        Post::where('id', $request->id)->update($validateData);
        return redirect('dashboard/posts/')->with('success', 'Update Post succesed');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Post::where('id', $id)->get();
        if ($data[0]->images) {
            Storage::delete($data[0]->images);
        }
        Post::destroy($id);
        return redirect('dashboard/posts/')->with('delete', 'Post Has Beend Deleted');
    }
    public function checkSlug(Request $request)
    {
        $slug = $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}

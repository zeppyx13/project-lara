<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Models\catagory;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "status1" => "active",
        "status2" => "",
        "status3" => ""
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "status1" => "",
        "status2" => "",
        "status3" => "active"
    ]);
});
Route::get('/blog', [PostController::class, 'index']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::get('/katagory/{catagory:slug}', function (catagory $catagory) {
    return view('posts', [
        'title' => $catagory->name,
        'posts' => $catagory->posts->load('author', 'catagory'),
    ]);
});
Route::get('/authors/{author:username}', function (User $author) {
    return view('posts', [
        'title' => "Author Posts : $author->name",
        'posts' => $author->post->load('catagory', 'author'),
    ]);
});

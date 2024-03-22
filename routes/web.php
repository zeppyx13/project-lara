<?php

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
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
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/Login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/Login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/Register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/Register', [RegisterController::class, 'store']);
Route::get('/posts/{post:slug}', [PostController::class, 'show']);
Route::resource('/dashboard/posts', DashboardPostController::class)->middleware('auth');
Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
// Route::get('/katagory/{catagory:slug}', function (catagory $catagory) {
//     return view('posts', [
//         "status" => "Blog",
//         'title' => $catagory->name,
//         'posts' => $catagory->posts->load('author', 'catagory'),
//     ]);
// });
// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         "status" => "Blog",
//         'title' => "Author Posts : $author->name",
//         'posts' => $author->post->load('catagory', 'author'),
//     ]);
// });
Route::get('/list-category/', function () {
    return view('daftar', [
        "status" => "Category",
        'title' => "Category",
        'items' => catagory::all(),
    ]);
});

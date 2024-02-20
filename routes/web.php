<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/blog', function () {
    return view('posts', [
        "title" => "Blog",
        "status1" => "",
        "status2" => "active",
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

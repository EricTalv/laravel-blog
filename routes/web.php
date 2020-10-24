<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts');
});

Route::get('/posts/{post}', 'PostsController@show');

Route::get('/articles/{article}', 'ArticlesController@show');

Route::get('/about', function () {
    return view('about', [
        'articles' => App\Article::take(3)->latest()->get() ]);
});

Route::get('/articles', function () {
    return view('articles', [
        'articles' => App\Article::latest()->paginate(2) ]);
});

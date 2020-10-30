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

Route::get('/about', function () {
    return view('about' , [ 'articles' => \App\Article::latest()->take(3)->get()
    ]);
});

// Show all articles
Route::get('/articles', 'ArticleController@index');
// Create Page
Route::get('/articles/create', 'ArticleController@create');
// Create Page
Route::put('/articles', 'ArticleController@store');
// Show one post
Route::get('/articles/{article}', 'ArticleController@show');

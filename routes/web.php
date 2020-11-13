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
})->name('home');

Route::get('/about', function () {
    return view('about' , [ 'articles' => \App\Article::latest()->take(3)->get()
    ]);
})->name('about');

// Show all articles
Route::get('/articles', 'ArticleController@index')->name('articles.index');

// Create Page
Route::get('/articles/create', 'ArticleController@create')->name('articles.create');

// Create Page
Route::put('/articles', 'ArticleController@store')->name('articles.store');

// Show post editing page
Route::get('/articles/edit/{article}', 'ArticleController@edit');

// Show one post
Route::get('/articles/{article}', 'ArticleController@show')->name('articles.show');

// Delete post
// Route::delete('/articles/{article}', 'ArticleController@destroy');

// Show post editing page
Route::put('/articles/{article}', 'ArticleController@update');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

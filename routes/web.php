<?php

use Illuminate\Support\Facades\Route;

use App\Article;
use App\Tag;

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

Route::get('/', 'ArticleController@welcomeArticles')->name('welcome');

Route::get('/about', function () {
    return view('about' , [ 'articles' => Article::latest()->take(3)->get()
    ]);
})->name('about');

// Show all articles
Route::get('/articles', 'ArticleController@index')->name('articles.index');

// Create Page
Route::get('/articles/create', 'ArticleController@create')->name('articles.create')->middleware('auth');

// Create Page
Route::put('/article/create', 'ArticleController@store')->name('articles.store');

// Show post editing page
Route::get('/articles/edit/{article}', 'ArticleController@edit')->name('articles.edit')->middleware('auth');

// Show one post
Route::get('/articles/{article}-{slug}', 'ArticleController@show')->name('articles.show');

// Delete post
// Route::delete('/articles/{article}', 'ArticleController@destroy');

// Persist edited data
Route::put('/articles/{article}', 'ArticleController@update');

// Authentication
Auth::routes();

// Dashboard
Route::get('/home', 'DashboardController@index')->name('home');

// User Page
Route::get('/users/{user}', 'UserController@show')->name('user');

// All Tags page
Route::get('/alltags', function () {
    return view('alltags', [ 'tags' => Tag::all()]);
})->name('alltags');

// Update user avatar
Route::post('/avatar', 'UserController@update_avatar');

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

Route::get('/', function () {
    return view('welcome',
        [
            'threeLatestArticles' => Article::latest()->take(3)->get(),
            'tags' => Tag::all(),
            'latestArticle' => Article::latest()->first(),
            'featuredArticles' => Article::latest()->take(2)->get(),
        ]);
})->name('welcome');

Route::get('/about', function () {
    return view('about' , [ 'articles' => Article::latest()->take(3)->get()
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

Route::get('/home', 'DashboardController@index')->name('home');

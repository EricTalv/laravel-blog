<?php

namespace App\Http\Controllers;

use App\Article;


class ArticlesController extends Controller
{

    // Show a List of resources
    public function index() {
        $articles = Article::latest()->get();

        return view('articles.index', [ 'articles' => $articles]);
    }

    // Show a Single resource
    public function show($id)
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    // Show a view to Create a new resource
    protected function create()
    {
        return view('articles.create');
    }

    // Persist( SAVE ) created resource
    protected function store()
    {
    }

    // Show a view to Edit an existing resource
    protected function edit()
    {
    }

    // Persist Edited resource
    protected function update()
    {
    }

    //  Delete the resource
    protected function destroy()
    {
    }
}

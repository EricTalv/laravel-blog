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
    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    // Show a view to Create a new resource
    protected function create()
    {
        return view('articles.create');
    }

    // Persist( SAVE ) created resource
    protected function store(Article $article)
    {

        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        Article::create([
            'title' => request('title'),
            'excerpt' => request('excerpt'),
            'body' => request('body')
        ]);

        return redirect('/articles');
    }

    // Show a view to Edit an existing resource
    protected function edit(Article $article)
    {
        // Find the article associated with the ID
        return view('articles.edit', compact('article'));
    }

    // Persist Edited resource
    protected function update($id)
    {
        request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $article = Article::findOrFail($id);

        $article->title = request('title');
        $article->excerpt = request('excerpt');
        $article->body = request('body');

        $article->save();

        return redirect('/articles/' . $article->id);
    }

    //  Delete the resource
    protected function destroy()
    {
    }
}

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
    protected function store()
    {
        Article::create($this->validateArticle());

        return redirect(route('articles.show'));
    }

    // Show a view to Edit an existing resource
    protected function edit(Article $article)
    {
        // Find the article associated with the ID
        return view('articles.edit', compact('article'));
    }

    // Persist Edited resource
    protected function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    //  Delete the resource
    protected function destroy()
    {
    }

    /**
     * @return array
     */
    protected function validateArticle(): array
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
        ]);
    }
}

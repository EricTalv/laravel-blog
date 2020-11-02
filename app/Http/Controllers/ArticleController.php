<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index()
    {
        return view('articles.index' , [ 'articles' => Article::latest()->get() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store()
    {
        $article = Article::create($this->validateArticle());

        return redirect('/articles/' . $article->id );
    }

    /**
     * Display the specified resource.
     *
     *
     *
     */
    public function show($id)
    {
        return view('articles.show', [ 'article' => Article::findOrFail($id) ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     */
    public function edit($id)
    {

        $article = Article::find($id);

        return view('articles.edit' , [ 'article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Article $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article)
    {
        $article->update($this->validateArticle());

        return redirect($article->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function validateArticle(): array {
        return request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required'
        ]);
    }
}

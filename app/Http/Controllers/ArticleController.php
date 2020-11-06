<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Article;
use App\Tag;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check for request on TAG
        if (request('tag')) {
            // Lookup tag in the database for any articles
            $articles = Tag::where('name', request('tag'))->firstOrFail()->articles;
        } else {
            // Otherwise give latest articles
            $articles = Article::latest()->get();
        }

        return view('articles.index' , [ 'articles' => $articles ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.create', [
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $article = Article::create($this->validateArticle());

        return redirect('/articles/' . $article->id );
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        return view('articles.show', [
            'article' => Article::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        return view('articles.edit' , [
            'article' => Article::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
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
     */
    public function destroy($id)
    {
        //
    }

    /**'
     * Return a VALIDATED array of requested items
     */
    public function validateArticle(): array {
        return request()->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required|max:255',
            'body' => 'required'
        ]);
    }
}

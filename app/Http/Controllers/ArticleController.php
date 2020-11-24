<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Article;
use App\Tag;


class ArticleController extends Controller
{

    /**
     *  Welcome page articles
     */
    public function welcomeArticles()
    {
        $newestArticle = Article::latest()
            ->first();

        $threeLatestArticles = Article::latest()
            ->where('id', '<>', $newestArticle->id)
            ->simplePaginate(3);

        return view('welcome',
            [
                'threeLatestArticles' => $threeLatestArticles,
                'tags' => Tag::all(),
                'newestArticle' => $newestArticle,
                'allFeaturedArticles' => Article::where('featured', 1)->latest()->get(),
                'featuredArticles' => Article::where('featured', '1')->latest()->skip(1)->take(2)->get(),
            ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Check for request for input TAG
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
        $this->validateArticle();

        // old->$article = Article::create($this->validateArticle());

        // Create a new article using the requested inputs
        $article = new Article(request(['title', 'excerpt', 'body']));
        // Add user Id to article
        $article->user_id = Auth::id();
        // Save article
        $article->save();

        // If Article is created
        if($article) {
            // get Tag Names
            $tagNames = request('tags');
            $tagIds = [];

            foreach ($tagNames as $tagName) {
                // Check for existing tags
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                if($tag) {
                    $tagIds[] = $tag->id;
                }
            }
            $article->tags()->sync($tagIds);
        }


        // OLD Add Tags to newly created article
        // OLD $article->tags()->attach(request('tags'));

        // Return our response
        return response()->json(null, 200);
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
            'body' => 'required',
            'tags' => 'exists:tags,id'
        ]);
    }
}

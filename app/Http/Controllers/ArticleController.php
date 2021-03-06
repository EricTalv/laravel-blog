<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Article;
use App\Tag;
use Illuminate\Support\Str;


class ArticleController extends Controller
{

    /**
     *  Welcome page articles
     */
    public function welcomeArticles()
    {
        $newestArticle = Article::latest()
            ->first();

        // Get pagination of 3 articles Excluding the first article.
        $threeLatestArticles = Article::latest()
            ->where('id', '<>', $newestArticle->id)
            ->simplePaginate(3);

        return view('welcome',
            [
                'threeLatestArticles' => $threeLatestArticles,
                'tags' => Tag::latest()->take(5)->get(),
                'newestArticle' => $newestArticle,
                'allFeaturedArticles' => Article::where('featured', 1)->latest()->get(),
                'featuredArticles' => Article::where('featured', 1)->latest()->take(2)->get(),
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
        $this->checkTags($article);

        // Response data
        $data = [
            "title" => $article->title,
            "id" => $article->id,
            "path" => $article->path(),
        ];

        // Return our response
        return response()->json( $data, 200);
    }

    /**
     * Display the specified resource.
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {

        return view('articles.show', [
            'article' => $article
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

        $this->checkTags($article);

        $data = [
            "title" => $article->title,
            "id" => $article->id,
            "path" => $article->path(),
        ];

        // Return our response
        return response()->json( $data, 200);
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
          //  'tags' => 'exists:tags,id'
        ]);
    }

    public function checkTags($article)
    {
        if($article && request('tags')) {
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
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use App\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
        # test2
        return view('post', [
            'post' => Post::where('slug', $slug)->firstOrFail()
        ]);
    }
}

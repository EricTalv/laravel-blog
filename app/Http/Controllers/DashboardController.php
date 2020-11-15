<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * This is where users get authenticated.
     *
     * Before a user gets to the INDEX page,
     * it is sent to the middleware
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard',
            [
            'latestArticle' => Article::latest()->first(),
        ]);
    }
}

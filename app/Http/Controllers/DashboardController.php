<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;


use App\Article;
use Image;
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
             'threeLatestArticles' => Auth::user()->articles()->latest()->Paginate(3),
             'latestArticle' => Auth::user()->articles()->latest()->first(),
        ]);
    }

    public function updateAvatar(Request $request) {
        // Handle user avatar upload
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars/' . $filename));

            $user = Auth::User();
            $user->avatar = $filename;
            $user->save();
        };

        return redirect('/home');
    }

}

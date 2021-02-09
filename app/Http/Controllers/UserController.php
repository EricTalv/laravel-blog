<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Image;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected function show(User $user) {

        return view('userprofile', [
            'user' => $user,
            'threeLatestArticles' => $user->articles()->latest()->paginate(3),
        ]);
    }




}

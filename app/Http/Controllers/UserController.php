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

    protected function update_avatar(Request $request)
    {
        // Handle user avatar upload
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/images/avatars' . $filename));
        };
    }


}

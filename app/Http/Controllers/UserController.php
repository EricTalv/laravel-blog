<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    protected function show(User $user) {

        $user = User::where('name', $user)->first();


        return $user;
//        return view('userprofile', [
//            'user' => $user
//        ]);
    }
}

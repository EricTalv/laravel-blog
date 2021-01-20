<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Str;

class UserController extends Controller
{
    protected function show(User $user) {

        return view('userprofile', [
            'user' => $user
        ]);
    }



}

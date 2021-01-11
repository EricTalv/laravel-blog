<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    protected function show(User $user) {
        return view('userProfile', [
            'user' => $user
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate comment
        $request->validate([
            'body' => 'required',
        ]);

        // Get all comment related data
        $input = $request->all();

        // Set User Id as current authenticated user
        $input['user_id'] = auth()->user()->id;


    }
}

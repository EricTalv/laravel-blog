<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{
    public function show($slug) {

        return view('project', [ 
            'project' => Project::where('slug', $slug)->firstOrFail()
        ]);

    }
}

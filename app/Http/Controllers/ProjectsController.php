<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class Projects extends Controller
{
    public function show() {

        $projects = Project::all();

        dd($projects);

        return view('projects', [
            'projectsList' => Project::all()
        ]);
    }
}

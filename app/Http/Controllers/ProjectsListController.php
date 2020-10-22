<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectsListController extends Controller
{
    public function show() {

        $projects = Project::get();

        ## dd($projects);

        return view('projects', [
            'projectsList' => Project::all()
        ]);
    }
}

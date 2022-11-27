<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index ()
    {
        $projects = Project::all();

        return view('projects.index', compact('projects'));
    }

    public function store ()
    {
        Project::create(request([
            'title',
            'description'
        ])); // fetch me the 'title' and the 'description' from the request

        return redirect('/projects');

    }
}

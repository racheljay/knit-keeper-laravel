<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return $project;
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return $project;
    }

    public function filter($user_id)
    {
        $project = Project::where('user_id', $user_id)->get();
        return $project;
    }
}

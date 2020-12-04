<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Project;

class Sub_ProjectsController extends Controller
{
    public function index() {
        $sub_project = Sub_Project::all();
        return $sub_project;
    }
    public function filter($project_id)
    {
        $sub_project = Sub_Project::where('project_id', $project_id)->get();
        return $sub_project;
    }


}

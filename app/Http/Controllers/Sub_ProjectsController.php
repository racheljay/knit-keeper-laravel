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

    public function create() {
        $sub_project = new Sub_Project();
        $sub_project->project_id = request('project_id');
        $sub_project->name = request('name');
        $sub_project->count = request('count');
        $sub_project->notes = request('notes');
        $sub_project->save();
    }

    public function show($id)
    {
        $sub_project = Sub_Project::findOrFail($id);
        return $sub_project;
    }

    public function update($id)
    {
        $sub_project = Sub_Project::findOrFail($id);
        $sub_project->name = request('name');
        $sub_project->count = request('count');
        $sub_project->notes = request('notes');
        $sub_project->save();

        return response(['data' => $sub_project, 'message' => 'Section updated successfully!', 'status' => true]);
    }
}

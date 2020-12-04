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

    public function create() {
        $project = new Project();
        $project->user_id = request('user_id');
        $project->project_name = request('project_name');
        $project->pattern_name = request('pattern_name');
        $project->pattern_url = request('pattern_url');
        $project->needle_size = request('needle_size');
        $project->yarn = request('yarn');

        $project->save();
    }

    public function delete(Request $request){
        $input = $request->all();
        $project = Project::findOrFail($input['id']);
        $project->delete();
        return response(['data' => $project, 'message' => 'Project deleted successfully!', 'status' => true]);
    }
}

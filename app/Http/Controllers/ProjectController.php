<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Projects;


class ProjectController extends Controller
{
    public function home()
    {
        $projects = Projects::paginate(10);

        return view('project.index', compact("projects"));
    }
    public function index()
    {
        $projects = Projects::all();

        return view('project.index', compact("projects"));
    }
    public function store(StoreProjectRequest $request)
    {
        Projects::create($request->validated());

        return redirect()->route('project.store');
    }
    public function edit(int $projectId)
    {
        $project = Projects::find($projectId);

        return view('project.edit', compact("project"));
    }
    public function update(UpdateProjectRequest $request, int $projectId)
    {
        Projects::findOrFail($projectId)->update($request->validated());

        return redirect()->route("project.index");
    }
}

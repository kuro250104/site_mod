<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Models\Projects;
use App\Models\Stages;
use Illuminate\Http\Request;

class StagesController extends Controller
{
    public function home()
    {
        $stages = Stages::paginate(20);
        $projects = Projects::all();

        return view('stage.index', compact('stages', 'projects'));
    }
    public function index()
    {
        $stages = Stages::all();

        return view('stage.index', compact('stages'));
    }
    public function store(StoreStageRequest $request)
    {
        Stages::create($request->validated());

        return redirect()->route('stage.index');
    }
    public function edit($stageId)
    {
        $stages = Stages::find($stageId);
        $projects = Projects::all();

        return view('stage.edit', compact('stages', 'projects'));
    }
    public function update(UpdateStageRequest $request, int $stageId)
    {
        Stages::findOrFail($stageId)->update($request->validated());


        return redirect()->route('stage.index');
    }
}

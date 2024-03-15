<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidatedHourRequest;
use App\Http\Requests\UpdateValidatedHourRequest;
use App\Models\Hour;
use App\Models\Projects;
use App\Models\Stages;
use App\Models\Subtask;
use App\Models\Task;
use App\Models\Team;
use App\Models\ValidatedHour;
use App\Models\Worker;
use Illuminate\Http\Request;

class ValidatedHourController extends Controller
{

    public function home()
    {
        $valid_hours = ValidatedHour::all();

        $teams = Team::all();
        $workers = Worker::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();



        return view('validated_hour.index', compact('valid_hours', 'projects', 'teams', 'workers', 'stages', 'tasks', 'hours', 'subtasks'));
    }


    public function index()
    {
        $valid_hours = ValidatedHour::all();

        return view('validated_hour.index', compact('valid_hours'));
    }
    public function store(StoreValidatedHourRequest $request)
    {

        ValidatedHour::create($request->validated());
//        dd($request->all());
        return redirect()->route('validated_hour.index');
    }
    public function edit( int $validHoursId)
    {
        $valid_hours = ValidatedHour::find($validHoursId);

        $teams = Team::all();
        $workers = Worker::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();



        return view('validated_hour.edit', compact('valid_hours', 'projects', 'teams', 'workers', 'stages', 'tasks', 'hours', 'subtasks'));
    }

    public function update(UpdateValidatedHourRequest $request, int $valid_hour)
    {
        ValidatedHour::findOrFail($valid_hour)->update($request->validated());

        return redirect()->route("validated_hour.index");
    }
}

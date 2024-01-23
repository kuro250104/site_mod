<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreValidatedHourRequest;
use App\Models\Projects;
use App\Models\Stages;
use App\Models\Task;
use App\Models\Team;
use App\Models\ValidatedHour;
use App\Models\Worker;
use Illuminate\Http\Request;

class ValidatedHourController extends Controller
{
    public function home()
    {
        $valid_hours = ValidatedHour::with(['worker', 'team', 'stageOne', 'taskOne', 'projectOne', 'stageTwo', 'taskTwo', 'projectTwo', 'stageThree', 'taskThree', 'projectThree','stageFour', 'taskFour', 'projectFour' ])
            ->paginate(15);

        $teams = Team::all();
        $workers = Worker::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();

        return view('validated_hour.index', compact('valid_hours', 'projects', 'teams', 'workers', 'stages', 'tasks'));
    }
    public function index()
    {
        $valid_hours = ValidatedHour::all();

        return view('validated_hour.index', compact('valid_hours'));
    }
    public function store(StoreValidatedHourRequest $request)
    {
        ValidatedHour::create($request->validated());

        return redirect()->route('validated_hour.index');
    }
}

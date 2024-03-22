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
use App\Models\User;
use App\Models\ValidatedHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidatedHourController extends Controller
{

    public function home()
    {

        $teams = Team::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();
        $user = Auth::user();



        if($user->can('user_manage')){

            $valid_hours = ValidatedHour::all();
        }
        else{
            $valid_hours = ValidatedHour::where('user_id', $user->id)->get();
        }




        return view('validated_hour.index', compact('valid_hours', 'projects','user', 'teams', 'stages', 'tasks', 'hours', 'subtasks'));
    }


    public function index()
    {
        $user = Auth::user();
        $valid_hours = ValidatedHour::where('user_id', $user->id)->get();

        return view('validated_hour.index', ['valid_hours'=> $valid_hours]);
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
        $users = User::all();
        $stages = Stages::all();
        $projects = Projects::all();
        $tasks = Task::all();
        $hours = Hour::all();
        $subtasks = Subtask::all();



        return view('validated_hour.edit', compact('valid_hours', 'projects', 'teams', 'users', 'stages', 'tasks', 'hours', 'subtasks'));
    }

    public function update(UpdateValidatedHourRequest $request, int $valid_hour)
    {
        ValidatedHour::findOrFail($valid_hour)->update($request->validated());

        return redirect()->route("validated_hour.index");
    }

    public function destroy($valid_hours)
    {
        ValidatedHour::destroy($valid_hours);

        return redirect()->route("validated_hour.index");
    }
}

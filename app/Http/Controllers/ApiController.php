<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\Projects;
use App\Models\Stages;
use App\Models\Subtask;
use App\Models\Task;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ApiController extends Controller
{
    public function getUserData()
    {
        $teams = Team::all();
        $hours = Hour::all();
        $users = User::all();

        return response()->json([
            'teams' => $teams,
            'hours' => $hours,
            'users' => $users
        ], Response::HTTP_OK);
    }

    public function getProductionData()
    {
        $tasks = Task::all();
        $subtasks = Subtask::all();
        $projects = Projects::all();
        $stages = Stages::all();

        return response()->json([
            'tasks' => $tasks,
            'subtasks' => $subtasks,
            'projects' => $projects,
            'stages' => $stages
        ],Response::HTTP_OK);
    }
}

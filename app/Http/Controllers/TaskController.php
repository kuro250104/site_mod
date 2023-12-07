<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function home()
    {
        $tasks = Task::paginate(10);

        return view('task.index', compact('tasks'));
    }
    public function index()
    {
        $tasks = Task::all();

        return view('task.index', compact('tasks'));
    }
    public function store(StoreTaskRequest $request)
    {
        Task::create($request->validated());

        return redirect()->route('task.index');
    }
    public function edit($taskId)
    {
        $task = Task::find($taskId);

        return view('task.edit', compact('task'));
    }
    public function update(UpdateTaskRequest $request, int $taskId)
    {
        Task::findOrFail($taskId)->update($request->validated());

        return redirect()->route('task.index');
    }
}

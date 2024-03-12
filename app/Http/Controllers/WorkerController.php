<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreWorkerRequest;

use App\Http\Requests\UpdateWorkerRequest;
use App\Models\Status;
use App\Models\Team;
use App\Models\Worker;
use Illuminate\Http\JsonResponse;

class WorkerController extends Controller


{
    public function home()
    {
        $workers = Worker::all();
        $teams = Team::all();
        $status = Status::all();

        return view('worker.index', compact("workers", "teams", 'status'));
    }
    public function index()
    {
        $workers = Worker::all();

        return view('worker.index', compact("workers"));
    }
    public function store(StoreWorkerRequest $request)
    {
        Worker::create($request->validated());

        return redirect()->route('worker.index');
    }
    public function edit(int $workerId)
    {
        $teams = Team::all();
        $worker = Worker::find($workerId);
        $status = Status::all();

        return view('worker.edit', compact("worker", "teams", "status"));
    }
    public function update(UpdateWorkerRequest $request, int $workerId)
    {
        Worker::findOrFail($workerId)->update($request->validated());

        return redirect()->route("worker.index");
    }
    public function getWorkersForSelector(): JsonResponse
    {
        $workers = Worker::all();

        return response()->json(['workers' => $workers]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateOperatorRequest;
use App\Models\Status;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class OperatorController extends Controller
{
    public function home()
    {
        $users = User::all();
        $teams = Team::all();
        $status = Status::all();

        return view('operator.index', compact("users", "teams", 'status'));
    }
    public function index()
    {
        $users = User::all();

        return view('operator.index', compact("users"));
    }
    public function store(StoreOperatorRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('worker.index');
    }
    public function edit(int $workerId)
    {
        $teams = Team::all();
        $user = User::find($workerId);
        $status = Status::all();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('operator.edit', compact("user", "teams", "status",'roles','userRole'));
    }
    public function update(UpdateOperatorRequest $request, int $userId)
    {
        User::findOrFail($userId)->update($request->validated());
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }


        return redirect()->route("operator.index");
    }
    public function getWorkersForSelector(): JsonResponse
    {
        $users = User::all();

        return response()->json(['user' => $users]);
    }
}


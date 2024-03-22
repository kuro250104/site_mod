<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Models\User;
use App\Models\Worker;

class TeamController extends Controller
{

    public function home()
    {
        $teams = Team::all();

        return view('team.index', compact("teams"));
    }

    public function index()
    {
        $teams = Team::all();

        return view('team.index', compact("teams"));

    }
    public function store(StoreTeamRequest $request)
    {
        Team::create($request->validated());

        return redirect()->route('team.index');
    }
    public function edit(int $teamId)
    {
        $team = Team::find($teamId);

        return view('team.edit', compact("team"));
    }
    public function update(UpdateTeamRequest $request, int $teamId)
    {
        Team::findOrFail($teamId)->update($request->validated());

        return redirect()->route("team.index");
    }
    public function view($id)
    {
        {
            $team = Team::find($id);

            if (!$team) {
                abort(404);
            }
            $user = User::where('team_id', $id)->get();
            $arrayUser = $user->toArray();

            return view('team.view', compact('team', 'arrayUser'));
        }
    }
}

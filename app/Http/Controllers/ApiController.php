<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\Team;
use App\Models\User;


class ApiController extends Controller
{
    public function getData()
    {
     $teams = Team::all();
     $hours = Hour::all();
     $users = User::all();
     return response()->json([
         'teams' =>$teams,
         'hours' => $hours,
         'users' => $users,
     ]);
    }
}

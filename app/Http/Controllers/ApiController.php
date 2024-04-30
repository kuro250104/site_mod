<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getData()
    {
        $teams = Team::all();
        $hours = Hour::all();
        $users = User::all();
    }
}

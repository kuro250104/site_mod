<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;

class HourController extends Controller
{
    public function home()
    {
        $hours = Hour::all();

        return view('hours.index', compact("hours"));
    }
}

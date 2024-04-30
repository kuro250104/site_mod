<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HourController extends Controller
{
    public function home()
    {
        $hours = Hour::all();

        return view('hours.index', compact("hours"));
    }
    public function getHoursDetails()
    {
        $hours = Hour::all();

        return response()->json($hours, Response::HTTP_OK);
    }
}

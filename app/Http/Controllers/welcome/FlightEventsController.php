<?php

namespace App\Http\Controllers\welcome;

use App\Http\Controllers\Controller;
use App\Models\FlighEvent;
use Illuminate\Http\Request;

class FlightEventsController extends Controller
{
    //
    public function getAll(Request $request = null){
        $fe_list = FlighEvent::all();
        return response()->json($fe_list);
    }
}

<?php

namespace App\Http\Controllers\api\welcome;

use App\Http\Controllers\Controller;
use App\Models\FlightEvent;
use Illuminate\Http\Request;

class FlightEventsControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function show(FlightEvent $flightEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FlightEvent $flightEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FlightEvent  $flightEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(FlightEvent $flightEvent)
    {
        //
    }
}

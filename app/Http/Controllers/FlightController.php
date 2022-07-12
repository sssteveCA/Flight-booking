<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;

class FlightController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $inputs = $request->all();
        $models = [];
        $inserted = true;
        foreach($request->flights as $n => $flight){
            $models[$n] = new Flight;
            $models[$n]->user_id = auth()->user()->id;
            $models[$n]->company_name = $flight['company_name'];
            $models[$n]->departure_country = $flight['departure_country'];
            $models[$n]->departure_airport = $flight['departure_airport'];
            $models[$n]->arrival_country = $flight['arrival_country'];
            $models[$n]->arrival_airport = $flight['arrival_airport'];
            $models[$n]->booking_date = $flight['booking_date'];
            $models[$n]->flight_date = $flight['flight_date'];
            $models[$n]->flight_time = $flight['flight_time'];
            $models[$n]->price = $flight['price'];
            $created = $models[$n]->save();
            if(!$created){
                //If there was a problem inserting record in DB
                $inserted = false;
                if($n > 0){
                    //If is not the first model inserted delete previous
                    for($i = $n; $n >= 0; $n--){
                        $models[$i]->forceDelete();
                    }        
                }//if($n > 0){
                break;
            }//if(!$created){
        }
        if($inserted){
            //Creation operations done successfully
        }
        else{
            //Error while inserting record in DB
        }
        return response()->json($inputs,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        //
    }
}

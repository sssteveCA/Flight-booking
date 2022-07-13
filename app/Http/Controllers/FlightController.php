<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Log;

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
        //$inputs = $request->all();
        $flights = $request->flights;
        $flights_unquoted = $this->flights_unquote($flights);
        Log::channel('stdout')->info("FlightController store flights unquoted => ");
        Log::channel('stdout')->info(var_export($flights_unquoted,true));
        $flights_info = $this->create_flights($flights_unquoted);
        $response_data = $this->setResponseData($flights_info);
        return response()->view(P::VIEW_BOOKFLIGHT,[
            'done' => $response_data['done'],
            'message' => $response_data['message']
        ],$response_data['code']);  
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

    //Remove backslashes from flights array keys
    private function flights_unquote(array $flights_quoted): array{
        $flights_unquoted = [];
        foreach($flights_quoted as $key => $val){
            Log::channel('stdout')->info("Flights unquote 1st foreach {$key}");
            $flights_unquoted[$key] = [];
            foreach($val as $sub_key => $sub_val){
                $sub_key_unq = str_replace("'","",$sub_key);
                Log::channel('stdout')->info("Flights unquote 2nd foreach before slashes remove {$sub_key} => {$sub_val}");
                Log::channel('stdout')->info("Flights unquote 2nd foreach {$sub_key_unq} => {$sub_val}");
                $flights_unquoted[$key][$sub_key_unq] = $sub_val;
            }
        }
        return $flights_unquoted;
    }

    //Insert new flight records in database
    private function create_flights(array $flights_data):array
    {
        $models = [];
        $array_return = [
            'inserted' => true,
            'flights_number' => 0,
            'flights' => []
        ];
        foreach($flights_data as $n => $flight){
            Log::channel('stdout')->info("FlightController store flight => ");
            Log::channel('stdout')->info(var_export($flight,true));
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
            $models[$n]->price = $flight['total_price'];
            $created = $models[$n]->save();
            if(!$created){
                //If there was a problem inserting record in DB
                $array_return = [
                    'inserted' => false,
                    'flight_number' => 0,
                    'flights' => []
                ];
                if($n > 0){
                    //If is not the first model inserted delete previous
                    for($i = $n; $n >= 0; $n--){
                        $models[$i]->forceDelete();
                    }        
                }//if($n > 0){
                break;
            }//if(!$created){
            $array_return['flights_number']++;
            //These info are for Paypal item description
            $array_return['flights'][] = [
                'name' => "Da {$flight['departure_airport']} a {$flight['arrival_airport']}",
                'total_price' => $flight['total_price']
            ];
        }//foreach($flights_data as $n => $flight){
        return $array_return;
    }

    //Set the data to send to the view
    private function setResponseData(array $params): array{
        $response_data = [];
        if($params['inserted']){
            $response_data['flights'] = $params['flights'];
            $response_data['done'] = true;
            $response_data['code'] = 201; //Created
            //Creation operations done successfully
            if($params['flights_number'] > 1)
                $response_data['message'] = C::OK_FLIGHTBOOK_MULTIPLE;
            else
                $response_data['message'] = C::OK_FLIGHTBOOK_SINGLE;       
        }//if($inserted){
        else{
            //Error while inserting record in DB
            $response_data['code'] = 500; //Internal server error
            $response_data['done'] = false;
            if($response_data['flights_number'] > 1)
                $response_data['message'] = C::ERR_FLIGHTBOOK_MULTIPLE;
            else
                $response_data['message'] = C::ERR_FLIGHTBOOK_SINGLE;
        }//else di if($inserted){
        return $response_data;
    }
}

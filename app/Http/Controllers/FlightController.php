<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use Illuminate\Support\Facades\Log;
use App\Traits\FlightTrait;

class FlightController extends Controller
{

    use FlightTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->id();
        //$flights_number = Flight::where('user_id',$user_id)->count();
        $flights_collection = Flight::where('user_id',$user_id)->get();
        $flights = $flights_collection->toArray();
        //Log::channel('stdout')->debug("User flights => ".var_export($flights,true));
        $flights_number = count($flights);
        if($flights_number > 0){
            //User has booked at least one flight
            return response()->view(P::VIEW_MYFLIGHTS,[
                'flights' => $flights,
                'flights_number' => $flights_number
            ]);
        }//if($flights_number > 0){
        else{
            //User has not booked any flight already
            $message = C::MESS_BOOKED_FLIGHT_LIST_EMPTY;
            return response()->view(P::VIEW_MYFLIGHTS,[
                C::KEY_MESSAGE => $message,
                'flights_number' => $flights_number
            ]);           
        }       
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
        Log::channel('stdout')->debug("FlightController store request all => ");
        Log::channel('stdout')->debug(var_export($inputs,true));
        $flights = $request->flights;
        $flights_unquoted = $this->flights_unquote($flights);
        Log::channel('stdout')->info("FlightController store flights unquoted => ");
        Log::channel('stdout')->info(var_export($flights_unquoted,true));
        $flights_info = $this->create_flights($flights_unquoted);
        $response_data = $this->setResponseData($flights_info);
        Log::channel('stdout')->info("FlightController store response_data => ".var_export($response_data,true));
        return response()->view(P::VIEW_BOOKFLIGHT,$response_data,$response_data['code']);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight,$myFlight)
    {
        $flight = Flight::find($myFlight);
        if($flight != null){
            //Requested flight found
            $user_id = auth()->id();
            if($user_id == $flight->user_id){
                return response()->view(P::VIEW_FLIGHT,[
                    'flight' => $flight
                ],200);
            }//if($user_id == $flight->user_id){
            else $code = 401; //Unauthorized
        }//if($flight != null){
        else $code = 404; //Forbidden
        return response()->view(P::VIEW_FALLBACK,
            [
                C::KEY_MESSAGES => [C::ERR_URLNOTFOUND_NOTALLOWED]
            ],$code);
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
    public function destroy(Flight $flight, $myFlight)
    {
        $response_data = [
            'deleted' => false,
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED
        ];
        $flight = Flight::find($myFlight);
        if($flight != null){
            //Requested resource exists
            $user_id = auth()->id();
            if($flight->user_id == $user_id){
                //The resource is owned by the logged user
                $response_data['deleted'] = $flight->delete();
                Log::channel('stdout')->info("FlightController destroy del => ".var_export($response_data['deleted'],true));
                $response_data[C::KEY_MESSAGE] = C::OK_FLIGHTDELETE;
                $code = 200; //OK
            }//if($flight->user_id == $user_id){
            else $code = 401; //Unauthorized
        }//if($flight != null){
        else $code = 404; //Not found
        return response()->json($response_data,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
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
}

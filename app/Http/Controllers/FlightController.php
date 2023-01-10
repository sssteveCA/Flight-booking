<?php

namespace App\Http\Controllers;

use App\Classes\Welcome\FlightsTempManager;
use App\Interfaces\Welcome\FlightsTempManagerErrors as Ftme;
use App\Exceptions\FlightsArrayException;
use App\Exceptions\FlightsTempNotAddedException;
use App\Exceptions\FlightsDataModifiedException;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\FlightTemp;
use App\Traits\Common\FlightControllerCommonTrait;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Cookie;

class FlightController extends Controller
{

    use FlightControllerCommonTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user_id = auth()->id();
            $response_data = $this->setIndexResponseData($user_id);
            return response()->view(P::VIEW_MYFLIGHTS,$response_data['response'],$response_data['code']);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->view(P::VIEW_MYFLIGHTS,[
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_MYFLIGHTS
                ],500)
            );
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
        //Log::channel('stdout')->debug("FlightController store");
        $inputs = $request->all();
        try{
            $flightsTemp = $this->getFlightsTempBySessionId($inputs['session_id']);
            //Log::channel('stdout')->debug("FlightController store flightTemps => ".var_export($flightsTemp,true));
            if(count($flightsTemp) >= 1){
                $flights_info = $this->create_flights($flightsTemp);
                $response_data = $this->setResponseData($flights_info);
                $del = FlightTemp::where('session_id',$inputs['session_id'])->delete();
                return response()->view(P::VIEW_BOOKFLIGHT,$response_data,$response_data['code']);
            }
            throw new Exception; 
        }catch(Exception $e){
            //Log::channel('stdout')->error("FlightController store exception => ".var_export($e->getMessage(),true));
            throw new HttpResponseException(
                response()->view(P::VIEW_BOOKFLIGHT,[
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_REQUEST,
                    C::KEY_STATUS => 'ERROR'
                ],400)
            );
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Flight  $flight
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight,$myFlight)
    {
        try{
            $flight = Flight::find($myFlight);
            if($flight != null){
                //Requested flight found
                $user_id = auth()->id();
                if($user_id == $flight->user_id){
                    return response()->view(P::VIEW_FLIGHT,[
                        'flight' => $flight
                    ],200);
                }//if($user_id == $flight->user_id){
            }//if($flight != null){
            throw new Exception;
        }catch(Exception $e){
            session()->put('redirect','1');
            return redirect(P::URL_ERRORS);
        }
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
        try{
            $response_data = [
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED
            ];
            $flight = Flight::find($myFlight);
            if($flight != null){
                $user_id = auth()->id();
                if($flight->user_id == $user_id){
                    $delete = $flight->delete();
                    //$delete = true;
                    if($delete){
                        $response_data = [
                            C::KEY_DONE => true, C::KEY_MESSAGE => C::OK_FLIGHTDELETE
                        ];
                        $code = 200;
                    }
                    else throw new Exception;
                }//if($flight->user_id == $user_id){
                else $code = 401;
            }//if($flight != null){
            else $code = 404;
            return response()->json($response_data,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_FLIGHT_DELETE
                ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
    }

    //Remove backslashes from flights array keys
    private function flights_unquote(array $flights_quoted): array{
        $flights_unquoted = [];
        foreach($flights_quoted as $key => $val){
            //Log::channel('stdout')->info("Flights unquote 1st foreach {$key}");
            $flights_unquoted[$key] = [];
            foreach($val as $sub_key => $sub_val){
                $sub_key_unq = str_replace("'","",$sub_key);
                /* Log::channel('stdout')->info("Flights unquote 2nd foreach before slashes remove {$sub_key} => {$sub_val}");
                Log::channel('stdout')->info("Flights unquote 2nd foreach {$sub_key_unq} => {$sub_val}"); */
                $flights_unquoted[$key][$sub_key_unq] = $sub_val;
            }
        }
        return $flights_unquoted;
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use Illuminate\Support\Facades\Log;

class FlightControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::channel('stdout')->info("FlightControllerApi index");
        $user_id = auth()->id();
        //$flights_number = Flight::where('user_id',$user_id)->count();
        $flights_collection = Flight::where('user_id',$user_id)->get();
        $flights = $flights_collection->toArray();
        //Log::channel('stdout')->debug("User flights => ".var_export($flights,true));
        $flights_number = count($flights);
        if($flights_number > 0){
            //User has booked at least one flight
            return response()->json([
                C::KEY_STATUS => 'OK',
                'flights' => $flights,
                'flights_number' => $flights_number
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }//if($flights_number > 0){
        else{
            //User has not booked any flight already
            $message = C::MESS_BOOKED_FLIGHT_LIST_EMPTY;
            return response()->json([
                C::KEY_STATUS => 'EMPTY',
                C::KEY_MESSAGE => $message,
                'flights_number' => $flights_number
            ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);           
        }    
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $flight = Flight::find($id);
        if($flight != null){
            //Requested flight found
            $user_id = auth()->id();
            if($user_id == $flight->user_id){
                return response()->json([
                    C::KEY_STATUS => 'OK',
                    'flight' => $flight
                ],200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }//if($user_id == $flight->user_id){
            else $code = 401; //Unauthorized
        }//if($flight != null){
        else $code = 404; //Forbidden
        return response()->json([
                C::KEY_STATUS => 'ERROR',
                C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
            ],$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response_data = [
            'deleted' => false,
            'message' => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ];
        $flight = Flight::find($id);
        if($flight != null){
            //Requested resource exists
            $user_id = auth()->id();
            if($flight->user_id == $user_id){
                //The resource is owned by the logged user
                $response_data['deleted'] = $flight->forceDelete();
                Log::channel('stdout')->info("FlightController destroy del => ".var_export($response_data['deleted'],true));
                $response_data[C::KEY_MESSAGE] = C::OK_FLIGHTDELETE;
                $code = 200; //OK
            }//if($flight->user_id == $user_id){
            else $code = 401; //Unauthorized
        }//if($flight != null){
        else $code = 404; //Not found
        return response()->json($response_data,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}

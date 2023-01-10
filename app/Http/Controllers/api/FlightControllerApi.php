<?php

namespace App\Http\Controllers\api;

use App\Classes\Welcome\FlightsTempManager;
use App\Interfaces\Welcome\FlightsTempManagerErrors as Ftme;
use App\Exceptions\FlightsDataModifiedException;
use App\Http\Controllers\Controller;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Interfaces\Constants as C;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Paths as P;
use App\Models\FlightTemp;
use App\Traits\Common\FlightControllerCommonTrait;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class FlightControllerApi extends Controller
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
            $user_id = auth('api')->user()->id;
            $response_data = $this->setIndexResponseData($user_id);
            return response()->json($response_data['response'],$response_data['code'],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_MYFLIGHTS
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
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
        $inputs = $request->all();
        try{
            $flightsTemp = $this->getFlightsTempBySessionId($inputs['session_id']);
            //Log::channel('stdout')->debug("FlightController store flightTemps => ".var_export($flightsTemp,true));
            if(count($flightsTemp) >= 1){
                $flights_info = $this->create_flights($flightsTemp);
                $response_data = $this->setResponseData($flights_info);
                $del = FlightTemp::where('session_id',$inputs['session_id'])->delete();
                return response()->json($response_data,$response_data['code'],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
            throw new Exception; 
            //$this->ftm = new FlightsTempManager($inputs);
            //$valid = $this->ftm->validateRequest();
            //if($valid){
            //Input data was not modified from orginal values
                /* Log::channel('stdout')->debug("FlightControllerApi store request all => ");
                Log::channel('stdout')->debug(var_export($inputs,true)); */
                //$flights = $request->flights;
                //$flights_unquoted = $this->flights_unquote($flights);
                /* Log::channel('stdout')->info("FlightControllerApi store flights unquoted => ");
                Log::channel('stdout')->info(var_export($flights,true)); */
                //$flights_info = $this->create_flights($flights);
                //$response_data = $this->setResponseData($flights_info);
                //Log::channel('stdout')->info("FlightController store response_data => ".var_export($response_data,true));
                //$del = FlightTemp::where('session_id',$this->ftm->getSessionId())->delete();
                //Log::channel('stdout')->info("FlightController store delete => ".var_export($del,true));
                //return response()->json($response_data,$response_data['code'],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            //}//if($valid){
                //throw new FlightsDataModifiedException(Ftme::FLIGHTSDATAMODIFIED_EXC);
        }catch(Exception $e){
            //Log::channel('stdout')->error("FlightController store exception => ".var_export($e->getMessage(),true));
            throw new HttpResponseException(
                response()->json([
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_REQUEST,
                    C::KEY_STATUS => 'ERROR'
                ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE)
            );
        }
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
            C::KEY_STATUS => 'ERROR',
            'deleted' => false,
            C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
        ];
        $flight = Flight::find($id);
        if($flight != null){
            //Requested resource exists
            $user_id = auth()->id();
            if($flight->user_id == $user_id){
                //The resource is owned by the logged user
                $response_data['deleted'] = $flight->delete();
                /* Log::channel('stdout')->info("FlightController destroy del => ".var_export($response_data['deleted'],true)); */
                if($response_data['deleted'])
                    $response_data[C::KEY_STATUS] = 'OK';
                $response_data[C::KEY_MESSAGE] = C::OK_FLIGHTDELETE;
                $code = 200; //OK
            }//if($flight->user_id == $user_id){
            else $code = 401; //Unauthorized
        }//if($flight != null){
        else $code = 404; //Not found
        return response()->json($response_data,$code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }
}

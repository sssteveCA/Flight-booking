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
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        try{
            $user_id = auth('api')->user()->id;
            $response_data = $this->setIndexResponseData($user_id);
            return response()->json($response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try{
            $inputs = $request->all();
            $user_id = auth('api')->user()->id;
            $flightsTemp = $this->getFlightsTempBySessionId($inputs['session_id']);
            if(count($flightsTemp) >= 1){
                $flights_info = $this->create_flights($flightsTemp,$user_id);
                $response_data = $this->setStoreResponseData($flights_info);
                FlightTemp::where('session_id',$inputs['session_id'])->delete();
                return response()->json($response_data,$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            }
            throw new Exception;
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_REQUEST,
                C::KEY_STATUS => 'ERROR'
            ],400,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try{
            $user_id = auth('api')->user()->id;
            $params = [
                'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED_API ]
            ];
            $response_data = $this->setShowResponseData($id,$user_id,$params);
            return response()->json($response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false,
                C::KEY_MESSAGE => C::ERR_REQUEST
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try{
            $user_id = auth('api')->user()->id;
            $params = [
                'messages' => [ 'error' => C::ERR_URLNOTFOUND_NOTALLOWED_API ]
            ];
            $response_data = $this->setDestroyResponseData($id,$user_id,$params);
            return response()->json($response_data[C::KEY_RESPONSE],$response_data[C::KEY_CODE],[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }catch(Exception $e){
            return response()->json([
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_FLIGHT_DELETE
            ],500,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        }
    }
}

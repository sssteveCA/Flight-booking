<?php

namespace App\Http\Controllers\bookflight;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Interfaces\Paths as P;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//This controller is used to allow users to book flights that previously have not been payed
class ResumeBookFlightController extends Controller
{
    //
    public function resumeFlight(Request $request){
        $response_data = $this->setResponseData($request);
        /* Log::channel('stdout')->debug("ResumeBookFlightController resumeFlight response_data => ");
        Log::channel('stdout')->debug(var_export($response_data,true)); */
        return response()->view(P::VIEW_BOOKFLIGHT,$response_data,$response_data['code']);
    }

    private function setResponseData(Request $request): array{
        $response_data = [
            C::KEY_DONE => false,
            'message' => '',
            'flights' => [],
            'code' => 400
        ];
        if($request->filled('flight_id')){
            $flight_id = $request->input('flight_id');
            $flight = Flight::find($flight_id);
            if($flight != null){
                $user_id = auth()->id();
                //Check if logged user can access to this resource
                if($user_id == $flight->user_id){
                    $response_data['flights'][] = [
                        'id' => $flight->id,
                        'name' => "Da {$flight->departure_airport} a {$flight->arrival_airport}",
                        'flight_price' => $flight->flight_price
                    ];
                    $response_data['message'] = C::OK_FLIGHTBOOK_SINGLE;
                    $response_data['code'] = 200; //OK
                    $response_data[C::KEY_DONE] = true;
                }//if($user_id == $flight->user_id){
                else
                    $response_data['code'] = 401; //Unauthorized
            }//if($flight != null){
            else 
                $response_data['code'] = 404; //Not found
            if($response_data[C::KEY_DONE] === false)
                $response_data['message'] = C::ERR_URLNOTFOUND_NOTALLOWED;
        }//if($request->filled('flight_id')){
        else
            $response_data['message'] = C::ERR_MISSEDDATA;
        return $response_data;
    }
}

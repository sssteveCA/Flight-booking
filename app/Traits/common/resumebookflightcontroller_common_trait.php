<?php

namespace App\Traits\Common;

use App\Models\Flight;
use App\Interfaces\Constants as C;
use Illuminate\Http\Request;

/**
 * This trait is used for common code between ResumeBookFlightController & ResumeBookFlightControllerApi
 */
trait ResumeBookFlightControllerCommonTrait{

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
?>
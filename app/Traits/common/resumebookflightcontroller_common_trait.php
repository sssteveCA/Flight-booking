<?php

namespace App\Traits\Common;

use App\Models\Flight;
use App\Interfaces\Constants as C;
use Illuminate\Http\Request;

/**
 * This trait is used for common code between ResumeBookFlightController & ResumeBookFlightControllerApi
 */
trait ResumeBookFlightControllerCommonTrait{

    /**
     * Set the response array to send to the view to complete the payment
     * @param \Illuminate\Http\Request $request 
     */
    private function setResponseData(Request $request): array{
        if($request->filled('flight_id')){
            $flight_id = $request->input('flight_id');
            $flight = Flight::find($flight_id);
            if($flight != null){
                $user_id = auth()->id();
                //Check if logged user can access to this resource
                if($user_id == $flight->user_id){
                    $flights[] = [
                        'id' => $flight->id,
                        'name' => "Da {$flight->departure_airport} a {$flight->arrival_airport}",
                        'flight_price' => $flight->flight_price
                    ];
                    return [
                        'code' => 200,
                        'response' => [
                            C::KEY_DONE => true, C::KEY_MESSAGE => C::OK_FLIGHTBOOK_SINGLE, 'flights' => $flights
                        ]    
                    ];
                }//if($user_id == $flight->user_id){
                return [ 'code' => 401 ];
            }//if($flight != null){
            return [ 'code' => 404 ];        
        }//if($request->filled('flight_id')){
        return [
            'code' => 400,
            'response' => [ C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_REQUEST ]
        ];
    }
}
?>
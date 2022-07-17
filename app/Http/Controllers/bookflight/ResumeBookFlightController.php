<?php

namespace App\Http\Controllers\bookflight;

use App\Http\Controllers\Controller;
use App\Interfaces\Constants as C;
use App\Models\Flight;
use Illuminate\Http\Request;

//This controller is used to allow users to book flights that previously have not been payed
class ResumeBookFlightController extends Controller
{
    //
    public function resumeFlight(Request $request){
        //If flight_id input exists and it's not empty
        if($request->filled('flight_id')){
            $flight_id = $request->input('flight_id');
            $flight = Flight::find($flight_id);
            $response_data = $this->setResponseData($flight);
        }//if($request->filled('flight_id')){
    }

    private function setResponseData(Flight $flight): array{
        $response_data = [];
        $response_data['done'] = false;
        $flight_array = [];
        if($flight != null){
            $user_id = auth()->id();
            //Check if logged user can access to this resource
            if($user_id == $flight->user_id){
                $flight_array = [
                    'id' => $flight->id,
                    'name' => "Da {$flight->departure_airport} a {$flight->arrival_airport}",
                    'total_price' => $flight->total_price
                ];
                $response_data['code'] = 200; //OK
                $response_data['done'] = true;
            }//if($user_id == $flight->user_id){
            else
                $response_data['code'] = 403; //Forbidden
        }//if($flight != null){
        else 
            $response_data['code'] = 404; //Not found
        $response_data['flight'] = $flight_array;
        if($response_data['done'] === false)
            $response_data['message'] = C::ERR_URLNOTFOUND_NOTALLOWED;
        return $response_data;
    }
}

<?php

namespace App\Traits\Common;

use App\Interfaces\Constants as C;
use App\Classes\Welcome\FlightsTempManager;
use App\Models\Flight;

//This trait contains same code for FlightController & FlightControllerApi
trait FlightControllerCommonTrait{
    private FlightsTempManager $ftm;

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
            /* Log::channel('stdout')->info("FlightController store flight => ");
            Log::channel('stdout')->info(var_export($flight,true)); */
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
            $models[$n]->adults = $flight['adults'];            
            $models[$n]->teenagers = $flight['teenagers'];            
            $models[$n]->children = $flight['children'];            
            $models[$n]->newborns = $flight['newborns'];           
            $models[$n]->flight_price = $flight['flight_price'];
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
                'id' => $models[$n]->id,
                'name' => "Da {$flight['departure_airport']} a {$flight['arrival_airport']}",
                'flight_price' => $flight['flight_price']
            ];
        }//foreach($flights_data as $n => $flight){
        return $array_return;
    }

    //Set the data to send to the view
    private function setResponseData(array $params): array{
        $response_data = [];
        $response_data['flights'] = $params['flights'];
        if($params['inserted']){
            $response_data['done'] = true;
            $response_data['code'] = 201; //Created
            //Creation operations done successfully
            $response_data[C::KEY_STATUS] = 'OK';
            if($params['flights_number'] > 1)
                $response_data[C::KEY_MESSAGE] = C::OK_FLIGHTBOOK_MULTIPLE;
            else
                $response_data[C::KEY_MESSAGE] = C::OK_FLIGHTBOOK_SINGLE;       
        }//if($inserted){
        else{
            //Error while inserting record in DB
            $response_data['code'] = 500; //Internal server error
            $response_data['done'] = false;
            $response_data[C::KEY_STATUS] = 'ERROR';
            if($response_data['flights_number'] > 1)
                $response_data[C::KEY_MESSAGE] = C::ERR_FLIGHTBOOK_MULTIPLE;
            else
                $response_data[C::KEY_MESSAGE] = C::ERR_FLIGHTBOOK_SINGLE;
        }//else di if($inserted){
        return $response_data;
    }
}
?>
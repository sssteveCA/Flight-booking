<?php

namespace App\Traits\Common;

use App\Interfaces\Constants as C;
use App\Classes\Welcome\FlightsTempManager;
use App\Exceptions\FlightsArrayException;
use App\Exceptions\FlightsDataModifiedException;
use App\Models\Flight;
use App\Models\FlightTemp;
use App\Interfaces\ExceptionsMessages as Em;

/**
 * This trait contains same code for FlightController & FlightControllerApi
 */
trait FlightControllerCommonTrait{
    private FlightsTempManager $ftm;

    /**
     * Insert new flight records in database
     * @param array $flight_data the flight booked data to insert
     * @return array the data to send to the booking confirm view
     */
    private function create_flights(array $flights_data,$user_id):array
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
            $models[$n]->user_id = $user_id;
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

    /**
     * Get the rows of flighttemp table that matches the provided session id 
     */
    private function getFlightsTempBySessionId(string $session_id): array{
        $this->errno = 0;
        if(isset($session_id)){
            $flights = FlightTemp::where('session_id',$session_id)->get();
            $fLenght = $flights->count();
            if($fLenght > 0){
                $fArray = $flights->toArray();
                return $fArray;
            }
            else
                throw new FlightsDataModifiedException(Em::FLIGHTSDATAMODIFIED_EXC);
        }//if(isset($this->flights_array['session_id'])){
        else 
            throw new FlightsDataModifiedException(Em::FLIGHTSDATAMODIFIED_EXC);
        return [];
    }

    /**
     * Set the response data for FlightController destroy method route
     */
    private function setDestroyResponseData($myFlight,$user_id,array $params): array{
        $flight = Flight::find($myFlight);
        if($flight != null) {
            if($flight->user_id == $user_id){
                if($flight->delete()){
                    return [
                        'code' => 200,
                        'response' => [
                            C::KEY_DONE => true, C::KEY_MESSAGE => C::OK_FLIGHTDELETE
                        ]
                    ];
                }//if($flight->delete()){
                return [
                    'code' => 500,
                    'response' => [
                        C::KEY_DONE => false,  C::KEY_MESSAGE => C::ERR_FLIGHT_DELETE
                    ]
                ];      
            }//if($flight->user_id == $user_id){
            return [
                'code' => 401,
                'response' => [
                    C::KEY_DONE => false,  C::KEY_MESSAGE => $params['messages']['error']
                ]
            ];
        }//if($flight != null) {
        return [
            'code' => 404,
            'response' => [
                C::KEY_DONE => false,  C::KEY_MESSAGE => $params['messages']['error']
            ]
        ];
    }

    /**
     * Set the response data for FlightController index method route
     */
    private function setIndexResponseData($user_id): array{
        $flight_collection = Flight::where('user_id',$user_id);
        $flights_number = $flight_collection->count();
        if($flights_number > 0){
            $flights = $flight_collection->toArray();
            return [
                'code' => 200,
                'response' => [
                    C::KEY_DONE => true, C::KEY_EMPTY => false, 'flights' => $flights, 'flights_number' => $flights_number
                ]
            ];
        }
        return [
            'code' => 200,
            'response' => [
                C::KEY_DONE => true, C::KEY_EMPTY => true, C::KEY_MESSAGE => C::MESS_BOOKED_FLIGHT_LIST_EMPTY, 'flights_number' => $flights_number
            ]
        ];
    }

    /**
     * Set the response data for FlightController show method route
     */
    private function setShowResponseData($myFlight,$user_id,array $params): array{
        $flight = Flight::find($myFlight);
        if($flight != null){
            if($user_id == $flight->user_id){
                return [
                    'code' => 200,
                    'response' => [
                        C::KEY_DONE => true, 'flight' => $flight
                    ]
                ];
            }
            return [
                'code' => 401,
                'response' => [
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => $params['messages']['error']
                ]
            ];
        }//if($flight != null){
        return [
            'code' => 404,
            'response' => [
                C::KEY_DONE => false,
                C::KEY_MESSAGE => $params['messages']['error']
            ]
        ];
    }

    /**
     * Set the response data for FlightController store method route
     */
    private function setStoreResponseData(array $params): array{
        $response_data = [];
        $response_data['flights'] = $params['flights'];
        if($params['inserted']){
            $response_data[C::KEY_DONE] = true;
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
            $response_data[C::KEY_DONE] = false;
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
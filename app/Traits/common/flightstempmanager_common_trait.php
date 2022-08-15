<?php

namespace App\Traits\Common;

use App\Classes\Welcome\FlightsTempManager;
use App\Exceptions\FlighstArrayException;
use App\Interfaces\Welcome\FlightsTempManagerErrors as Ftme;
use App\Models\FlightTemp;
use App\Traits\ErrorTrait;
use Illuminate\Support\Facades\Log;

//Common code between flightstempmanager.php & flightstempmanagerapi.php
trait FlightsTempManagerCommonTrait{

    use ErrorTrait;

    private FlightTemp $flight_temp;
    private array $flights_array;
    private int $flights_array_lenght;
    private string $session_id;

    private static int $random_times = 75;
    private static array $flights_direction = ['oneway','outbound','return'];
    private static array $flight_properties = ['company_name','departure_country','departure_airport','booking_date',
    'flight_date','flight_time','arrival_country','arrival_airport','adults','teenagers','children','newborns',
    'total_price' ];

    public function getFlightsArray(){return $this->flights_array;}
    public function getFlightsArrayLength(){return $this->flights_array_lenght;}
    public function getSessionId(){return $this->session_id;}

    /**
     * Check if flights array is valid
     * 
     * @param array $data
     * 
     * @return void
     * */
    private function checkFlightsArray(array $data){
        Log::channel('stdout')->info("FlightsTempManager trait checkFlightsArray");
        $count = count($data);
        $classname = __CLASS__;
        if($count > 0 && $count <= 2){
            foreach($data['flights'] as $direction => $flight){
                if(in_array($direction,$classname::$flights_direction)){
                    foreach($flight as $key => $value){
                        if(!in_array($key,$classname::$flight_properties)){
                            throw new FlighstArrayException(Ftme::FLIGHTARRAY_EXC);
                        }
                    }//foreach($flight as $key => $value){
                }//if(in_array($direction,FlightTempManager::$flights_direction)){
                else
                    throw new FlighstArrayException(Ftme::FLIGHTARRAY_EXC,1);
            }//foreach($data as $direction => $flight){
        }//if($count > 0 && $count <= 2){
        else{
            throw new FlighstArrayException(Ftme::FLIGHTARRAY_EXC,1);
        }
        $this->flights_array_lenght = $count;
    }

    /**
     * Add single flight temp record
     * 
     * @param array $data
     * @param string $flight_type
     * 
     * @return bool
     * */
    private function addFlightTemp(array $data, string $flight_type): bool{
        Log::channel('stdout')->info("FlightsTempManager trait addFlightTemp");
        $add = false;
        $this->errno = 0;
        $this->flight_temp = new FlightTemp;
        $this->flight_temp->session_id = $data['session_id'];
        $this->flight_temp->flight_type = $data['flight_type'];
        $this->flight_temp->flight_direction = $data['flight_direction'];
        $flight_array = $this->flights_array['flights'][$flight_type];
        $this->flight_temp->company_name = $flight_array['company_name'];
        $this->flight_temp->departure_country = $flight_array['departure_country'];
        $this->flight_temp->departure_airport = $flight_array['departure_airport'];
        $this->flight_temp->company_name = $flight_array['arrival_country'];
        $this->flight_temp->arrival_country = $flight_array['arrival_airport'];
        $this->flight_temp->arrival_airport = $flight_array['company_name'];
        $this->flight_temp->booking_date = $flight_array['booking_date'];
        $this->flight_temp->flight_date = $flight_array['flight_date'];
        $this->flight_temp->flight_time = $flight_array['flight_time'];
        $this->flight_temp->adults = $flight_array['adults'];
        $this->flight_temp->teenagers = $flight_array['teenagers'];
        $this->flight_temp->children = $flight_array['children'];
        $this->flight_temp->newborns = $flight_array['newborns'];
        $this->flight_temp->flight_price = $flight_array['total_price'];
        $insert = $this->flight_temp->save();
        if($insert)
            $add = true;
        return $add;
    }

    /**
     * Check if the values from request are equal to table record values
     * 
     * @param array $request
     * @param array $retrieved
     * 
     * @return bool
     * */
    private function checkEquality(array $request, array $retrieved): bool{
        $equal = true;
        foreach($request as $key => $value){
            if($request[$key] != $retrieved[$key]){
                if($key == 'total_price'){
                    if($request[$key] != $retrieved['flight_price']){
                        $equal = false;
                        break;
                    }
                }//if($key == 'total_price'){
                else{
                    $equal = false;
                    break;
                }
            }//if($request[$key] != $retrieved[$key]){
        }//foreach($request as $key => $value){
        return $equal;
    }

    /**
     * Check if user with session id has shortly before done a flight search
     * 
     * @return void
     * */
    private function checkFlightSearchRequests(string $session_id): bool{
        Log::channel('stdout')->info("FlightsTempManager trait checkFlightSearchRequests");
        $exists = false;
        $flights = FlightTemp::where('session_id',$session_id)->get();
        //Get the number of items in the collection
        if($flights->count() > 0){
            //user has done shortly before a flight search
            $exists = true;
        }//if($flights->count() > 0){
        return $exists;
    }

    //Generate a random session id to identity the user that does the request
    private function setSessionId(){
        Log::channel('stdout')->info("FlightsTempManager trait setSessionId");
        $session_id = "";
        $classname = __CLASS__;
        $characters = 'aAbBcCdDeEfFGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789';
        $length = strlen($characters);
        $exists = false;
        do{
            for($i = 0; $i < $classname::$random_times; $i++){
                $c = mt_rand(0, $length-1);
                $session_id .= $characters[$c];
            }
            $exists = $this->checkFlightSearchRequests($session_id);
        }while($exists);
        
        $this->session_id = $session_id.time();
    }

    /**
     * validate request before insert flight record in flights table
     * 
     * @return bool
     * */
    public function validateRequest(): bool{
        $valid = false;
        $this->errno = 0;
        Log::channel('stdout')->debug("FlightsTempManagerCommonTrait validateRequest this flights array => ".var_export($this->flights_array,true));
        if(isset($this->flights_array['session_id'])){
            $session_id = $this->flights_array['session_id'];
            $check_flights = FlightTemp::where('session_id',$session_id)->get();
            $cf_length = $check_flights->count();
            if($cf_length > 0){
                $cf_array = $check_flights->toArray();
                Log::channel('stdout')->debug("FlightsTempManagerCommonTrait validateRequest cf_array => ".var_export($cf_array,true));
                if($cf_length == 1){
                    //Oneway ticket
                    $equal = $this->checkEquality($this->flights_array['flights']['oneway'],$cf_array[0]);
                    if($equal)
                        $valid = true;
                    else
                        $this->errno = Ftme::INVALIDREQUEST;
                }//if($cf_length == 1){
                else if($cf_length == 2){
                    //Roundtrip ticket
                    $equal1 = $this->checkEquality($this->flight_array['flights']['outbound'],$cf_array[0]);
                    if($equal1){
                         $equal2 = $this->checkEquality($this->flight_array['flights']['return'],$cf_array[1]);
                         if($equal2)
                            $valid = true;
                            else
                            $this->errno = Ftme::INVALIDREQUEST;
                    }//if($equal1){
                    else
                        $this->errno = Ftme::INVALIDREQUEST;
                }//else if($cf_length == 2){
                else
                    throw new FlighstArrayException(Ftme::FLIGHTARRAY_EXC);
            }//if($cf_length > 0){
            else
                $this->errno = Ftme::NOTFOUND;
        }//if(isset($this->flights_array['session_id'])){
        else
            throw new FlighstArrayException(Ftme::SESSION_ID_EXC);
        
        return $valid;
    }
}

?>
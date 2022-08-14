<?php

namespace App\Traits\Common;

use App\Exceptions\FlightArrayException;
use App\Classes\Welcome\FlightTempManager;
use App\Interfaces\Welcome\FlightTempManagerErrors as Ftme;
use App\Models\FlightTemp;
use App\Traits\ErrorTrait;

//Common code between flightstempmanager.php & flightstempmanagerapi.php
trait FlightsTempManagerCommonTrait{

    use ErrorTrait;

    private FlightTemp $flight_temp;
    private array $flights_array;
    private int $flights_array_lenght;
    private string $session_id;

    private static array $flight_directions = ['oneway','outbound','return'];
    private static array $flight_properties = ['company_name','departure_country','departure_airport','booking_date',
    'flight_date','flight_time','arrival_country','arrival_airport','adults','teenagers','children','newborns',
    'total_price' ];

    public function getFlightsArray(){return $this->flights_array;}
    public function getFlightsArrayLength(){return $this->flights_array_lenght;}
    public function getSessionId(){return $this->session_id;}

    //check if flights array is valid
    private function checkFlightsArray(array $data){
        $count = count($data);
        if($count > 0 && $count <= 2){
            foreach($data as $direction => $flight){
                if(in_array($direction,__CLASS__::$flight_directions)){
                    foreach($flight as $key => $value){
                        if(!in_array($key,__CLASS__::$flight_properties)){
                            throw new FlightArrayException(Ftme::FLIGHTARRAY_EXC);
                        }
                    }//foreach($flight as $key => $value){
                }//if(in_array($direction,FlightTempManager::$flight_directions)){
                else
                    throw new FlightArrayException(Ftme::FLIGHTARRAY_EXC,1);
            }//foreach($data as $direction => $flight){
        }//if($count > 0 && $count <= 2){
        else{
            throw new FlightArrayException(Ftme::FLIGHTARRAY_EXC,1);
        }
        $this->flights_array_lenght = $count;
    }

    //Add single flight temp record
    private function addFlightTemp(array $data): bool{
        $add = false;
        $this->errno;
        $this->flight_temp = new FlightTemp;
        $this->flight_temp->session_id = $data['session_id'];
        $this->flight_temp->flight_type = $data['flight_type'];
        $this->flight_temp->flight_direction = $data['flight_direction'];
        $this->flight_temp->company_name = $this->flights_array['company_name'];
        $this->flight_temp->departure_country = $this->flights_array['departure_country'];
        $this->flight_temp->departure_airport = $this->flights_array['departure_airport'];
        $this->flight_temp->company_name = $this->flights_array['arrival_country'];
        $this->flight_temp->arrival_country = $this->flights_array['arrival_airport'];
        $this->flight_temp->arrival_airport = $this->flights_array['company_name'];
        $this->flight_temp->booking_date = $this->flights_array['booking_date'];
        $this->flight_temp->flight_date = $this->flights_array['flight_date'];
        $this->flight_temp->flight_time = $this->flights_array['flight_time'];
        $this->flight_temp->adults = $this->flights_array['adults'];
        $this->flight_temp->teenagers = $this->flights_array['teenagers'];
        $this->flight_temp->children = $this->flights_array['children'];
        $this->flight_temp->newborns = $this->flights_array['newborns'];
        $this->flight_temp->flight_price = $this->flights_array['flight_price'];
        $insert = $this->flight_temp->save();
        if($insert)
            $add = true;
        return $add;
    }

    //Check if user with session id has shortly before done a flight search
    private function checkFlightSearchRequests(): bool{
        $exists = false;
        $flights = FlightTemp::where('session_id',$this->session_id)->get();
        //Get the number of items in the collection
        if($flights->count() > 0){
            //user has done shortly before a flight search
            $exists = true;
        }//if($flights->count() > 0){
        return $exists;
    }

}

?>
<?php

namespace App\Traits\Common;

use App\Exceptions\FlightArrayException;
use App\Classes\Welcome\FlightTempManager;
use App\Interfaces\Welcome\FlightTempManagerErrors as Ftme;

//Common code between flightstempmanager.php & flightstempmanagerapi.php
trait FlightsTempManagerCommonTrait{

    private array $flights_array;

    private static array $flight_directions = ['oneway','outbound','return'];
    private static array $flight_properties = ['company_name','departure_country','departure_airport','booking_date',
    'flight_date','flight_time','arrival_country','arrival_airport','adults','teenagers','children','newborns',
    'total_price' ];

    public function getFlightsArray(){return $this->flights_array;}

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
    }

}

?>
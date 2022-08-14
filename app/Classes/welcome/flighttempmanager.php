<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Exceptions\FlightArrayException;
use App\Interfaces\Welcome\FlightTempManagerErrors as Ftme;

class FlightTempManager implements Ftme{
    use ErrorTrait, MmCommonTrait;

    private array $flights_array;

    public function __construct(array $data)
    {
        
    }

    public function getFlightsArray(){return $this->flights_array;}

    //check if flights array is valid
    private function checkFlightArray(array $data){
        $count = count($data);
        if($count > 0 && $count <= 2){

        }//if($count > 0 && $count <= 2){
        else{
            throw new FlightArrayException(Ftme::FLIGHTARRAY_EXC,1);
        }
    }
}
?>
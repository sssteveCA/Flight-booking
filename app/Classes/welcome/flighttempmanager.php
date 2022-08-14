<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Exceptions\FlightArrayException;
use App\Interfaces\Welcome\FlightTempManagerErrors as Ftme;
use App\Models\FlightTemp;
use App\Traits\Common\FlightsTempManagerCommonTrait;

class FlightTempManager implements Ftme{
    use ErrorTrait, MmCommonTrait, FlightsTempManagerCommonTrait;


    public function __construct(array $data,string $session_id)
    {
        $this->checkFlightsArray($data);
        $this->flights_array = $data;
    }

    //Add a new flight temp record
    public function addFlightTemp(): bool{
        $add = false;
        $exists = $this->checkFlightSearchRequests();
        if($exists){
            $delete = FlightTemp::where('session_id',$this->session_id)->delete();
        }
        
        return $add;
    }

}
?>
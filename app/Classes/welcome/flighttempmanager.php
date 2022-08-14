<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Exceptions\FlightArrayException;
use App\Interfaces\Welcome\FlightTempManagerErrors as Ftme;
use App\Traits\Common\FlightsTempManagerCommonTrait;

class FlightTempManager implements Ftme{
    use ErrorTrait, MmCommonTrait, FlightsTempManagerCommonTrait;


    public function __construct(array $data,string $session_id)
    {
        $this->checkFlightsArray($data);
        $this->flights_array = $data;
    }

}
?>
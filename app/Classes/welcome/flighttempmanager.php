<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;

class FlightTempManager{
    use ErrorTrait, MmCommonTrait;

    private array $flights_array;

    public function __construct(array $data)
    {
        
    }
}
?>
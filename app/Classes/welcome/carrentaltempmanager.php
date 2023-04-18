<?php

namespace App\Classes\Welcome;

use App\Traits\CarRentalTempTrait;
use App\Traits\MmCommonTrait;

class CarRentalTempManager{
    use MmCommonTrait, CarRentalTempTrait;

    private array $carrentalpricetemp_array;
    private static int $random_times = 75;
    private ?string $session_id;

    public function __construct(array $data)
    {
        $this->carrentalpricetemp_array = $data;
    }

    public function getCarRentalPriceTempArray(){return $this->carrentalpricetemp_array;}
    public function getSessionId(){return $this->session_id;}
    public function getError(){
        switch($this->errno){
            default:
                $this->error = null;
                break;
        }
        return $this->error;
    }
}
?>
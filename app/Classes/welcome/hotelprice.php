<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Hotels as H;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use App\Traits\HotelPriceTrait;

class HotelPrice implements Hpe{
    use ErrorTrait, MmCommonTrait,HotelPriceTrait;

    private array $hotelPriceInputs;

    private float $fullPrice;

    public function __construct(array $data)
    {
        $this->hotelPriceInputs = $this->data;
    }

    public function getFullPrice(){return $this->fullPrice;}
    public function getHotelPriceInputs(){return $this->hotelPriceInputs;}

    private function calcPreventive(){


    }
}
?>
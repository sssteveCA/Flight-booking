<?php

namespace App\Classes\Welcome;

use App\Traits\ErrorTrait;
use App\Traits\MmCommonTrait;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use App\Traits\HotelPriceTrait;

class HotelPrice implements Hpe{
    use ErrorTrait, MmCommonTrait,HotelPriceTrait;
}
?>
<?php

namespace App\Traits\Common;

use App\Exceptions\HotelDataModifiedException;
use App\Models\HotelPriceTemp;
use App\Interfaces\ExceptionsMessages as Em;
use Illuminate\Support\Facades\Log;

/**
 * This trait contain common code between HotelController and HotelControllerApi
 */
trait HotelControllerCommonTrait{


    private function create_hotel(string $session_id){
        $hotelTemp = HotelPriceTemp::where('session_id',$session_id)->first();
        if(!$hotelTemp)
            throw new HotelDataModifiedException(Em::HOTELDATAMODIFIED_EXC);
        Log::channel('stdout')->info("HotelControllerCommonTrait create_hotel hotelTemp => ".var_export($hotelTemp,true));
    }
}
?>
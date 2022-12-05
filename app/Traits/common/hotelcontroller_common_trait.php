<?php

namespace App\Traits\Common;

use App\Exceptions\DatabaseInsertionException;
use App\Exceptions\HotelDataModifiedException;
use App\Models\HotelPriceTemp;
use App\Interfaces\ExceptionsMessages as Em;
use App\Models\Hotel;
use Illuminate\Support\Facades\Log;

/**
 * This trait contain common code between HotelController and HotelControllerApi
 */
trait HotelControllerCommonTrait{


    /**
     * Insert a new hotel room booking in hotels table
     */
    private function create_hotel(string $session_id){
        $hotelTemp = HotelPriceTemp::where('session_id',$session_id)->first();
        if(!$hotelTemp)
            throw new HotelDataModifiedException(Em::HOTELDATAMODIFIED_EXC);
        Log::channel('stdout')->info("HotelControllerCommonTrait create_hotel hotelTemp => ".var_export($hotelTemp,true));
        $hotel = new Hotel;
        $hotel->user_id = auth()->user()->id;
        $hotel->country = $hotelTemp->country;
        $hotel->city = $hotelTemp->city;
        $hotel->hotel = $hotelTemp->hotel;
        $hotel->booking_date = date("Y-m-d");
        $hotel->checkin = $hotelTemp->checkin;
        $hotel->checkout = $hotelTemp->checkout;
        $hotel->rooms = $hotelTemp->rooms;
        $hotel->people = $hotelTemp->people;
        $hotel->price = $hotelTemp->price;
        $saved = $hotel->save();
        if(!$saved)
            throw new DatabaseInsertionException(Em::HOTEL_NEWROW_EXC);
        $hotelTemp->delete();
    }
}
?>
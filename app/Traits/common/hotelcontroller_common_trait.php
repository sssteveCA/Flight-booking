<?php

namespace App\Traits\Common;

use App\Exceptions\DatabaseInsertionException;
use App\Exceptions\HotelDataModifiedException;
use App\Models\HotelPriceTemp;
use App\Interfaces\Constants as C;
use App\Interfaces\ExceptionsMessages as Em;
use App\Models\Hotel;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Paths as P;

/**
 * This trait contain common code between HotelController and HotelControllerApi
 */
trait HotelControllerCommonTrait{


    /**
     * Insert a new hotel room booking in hotels table
     */
    private function create_hotel(string $session_id): Hotel{
        $hotelTemp = HotelPriceTemp::where('session_id',$session_id)->first();
        if(!$hotelTemp)
            throw new HotelDataModifiedException(Em::HOTELDATAMODIFIED_EXC);
        //Log::channel('stdout')->info("HotelControllerCommonTrait create_hotel hotelTemp => ".var_export($hotelTemp,true));
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
        return $hotel;
    }

    private function setIndexResponseData($user_id): array{
        $hotels_collection = Hotel::where('user_id',$user_id)->get();
            //Log::channel('stdout')->info("HotelController index hotel_collections => ".var_export($hotels_collection,true));
            $hotels_number = $hotels_collection->count();
            if($hotels_number > 0){
                $hotels = $hotels_collection->toArray();
                //Log::channel('stdout')->info("HotelController index hotel array => ".var_export($hotels,true));
                return [
                    C::KEY_DONE => true,
                    C::KEY_EMPTY => false,
                    'hotels' => $hotels,
                    'hotels_number' => $hotels_number];
            }//if($hotels_number > 0){ 
            return [
                C::KEY_DONE => true,
                C::KEY_EMPTY => true,
                C::KEY_MESSAGE => C::MESS_BOOKED_HOTEL_LIST_EMPTY,
                'hotels_number' => $hotels_number
            ];
    }

    /**
     * Set the array to send to the view
     * @param Hotel $hotel the data of the Hotel instance insterted
     */
    private function setResponseData(Hotel $hotel): array{
        /* Log::channel('stdout')->info("HotelControllerCommonTrait setResponseData => hotel array => ".var_export($hotel->toArray(),true));
        Log::channel('stdout')->info("HotelControllerCommonTrait setResponseData => hotel array no attr => ".var_export($hotel->attributesToArray(),true)); */
        return [
            C::KEY_DONE => true,
            C::KEY_STATUS => "OK",
            C::KEY_MESSAGE => "Per confermare la prenotazione delle stanze d' albergo fai click su 'PAGA'",
            'hotel' => $hotel->toArray()
        ];
    }


}
?>
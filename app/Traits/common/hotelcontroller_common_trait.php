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
    private function create_hotel(string $session_id, $user_id): Hotel{
        $hotelTemp = HotelPriceTemp::where('session_id',$session_id)->first();
        if(!$hotelTemp)
            throw new HotelDataModifiedException(Em::HOTELDATAMODIFIED_EXC);
        $hotel = new Hotel;
        $hotel->user_id = $user_id;
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

    /**
     * Response data for the HotelController destroy method route
     */
    private function setDestroyResponseData($myHotel, $user_id): array{
        $hotel = Hotel::find($myHotel);
        if($hotel != null){
            if($hotel->user_id == $user_id){
                $delete = $hotel->delete();
                //$delete = true;
                if($delete){
                    return [
                        C::KEY_CODE => 200,
                        C::KEY_RESPONSE => [
                            C::KEY_DONE => true,
                            C::KEY_MESSAGE => C::OK_HOTELDELETE
                        ]
                    ];
                }//if($hotel->delete()){
                return [ 
                    C::KEY_CODE => 500,
                    C::KEY_RESPONSE => [
                        C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_HOTEL_DELETE
                    ]
                 ];
            }//if($hotel->user_id == $user_id){
            return [ 
                C::KEY_CODE => 401,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
                ]
            ];
        }//if($hotel != null){
            return [ 
                C::KEY_CODE => 404,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => false,
                    C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
                ]
            ];
    }

    /**
     * Response data for the HoteController index method route
     */
    private function setIndexResponseData($user_id): array{
        $hotels_collection = Hotel::where('user_id',$user_id)->get();
        $hotels_number = $hotels_collection->count();
        if($hotels_number > 0){
            $hotels = $hotels_collection->toArray();
            return [
                C::KEY_CODE => 200,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => true, C::KEY_EMPTY => false,
                    'hotels' => $hotels, 'hotels_number' => $hotels_number
                ]
            ];
        }//if($hotels_number > 0){ 
        return [
            C::KEY_CODE => 200,
            C::KEY_RESPONSE => [
                C::KEY_DONE => true, C::KEY_EMPTY => true, C::KEY_MESSAGE => C::MESS_BOOKED_HOTEL_LIST_EMPTY,
                'hotels_number' => $hotels_number
            ]
        ];
    }

    /**
     * Response data for HotelController show method route
     */
    private function setShowResponseData($myHotel,$user_id, array $params): array{
        $hotel = Hotel::find($myHotel);
        if($hotel != null){
            if($user_id == $hotel->user_id){
                return [
                    C::KEY_CODE => 200,
                    C::KEY_RESPONSE => [
                        C::KEY_DONE => true, 'hotel' => $hotel
                    ]
                ];
            }//if($user_id == $hotel->user_id){
            return [
                C::KEY_CODE => 401,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => false, C::KEY_MESSAGE => $params['messages']['error']
                ]
            ];
        }//if($hotel != null){
        return [
            C::KEY_CODE => 404,
            C::KEY_RESPONSE => [
                C::KEY_DONE => false, C::KEY_MESSAGE => $params['messages']['error']
            ]
        ];
    }

    /**
     * Set the responde data for the store route
     * @param Hotel $hotel the data of the Hotel instance insterted
     */
    private function setStoreResponseData(Hotel $hotel): array{
        return [
            C::KEY_DONE => true,
            C::KEY_MESSAGE => "Per confermare la prenotazione delle stanze d' albergo fai click su 'PAGA'",
            'hotel' => $hotel->toArray()
        ];
    }


}
?>
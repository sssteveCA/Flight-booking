<?php

namespace App\Traits\Common;

use App\Exceptions\CarRentalDataModifiedException;
use App\Exceptions\DatabaseInsertionException;
use App\Models\CarRental;
use App\Models\CarRentalTemp;
use App\Interfaces\ExceptionsMessages as Em;
use App\Interfaces\Constants as C;

/**
 * This trait contains code shared between CarRentalController and CarRentalControllerApi
 */
trait CarRentalControllerCommonTrait{

    /**
     * Insert a new rented car in carrentals table
     */
    private function create_rented_car(string $session_id,$user_id): CarRental{
        $crtemp = CarRentalTemp::where('session_id',$session_id)->first();
        if(!$crtemp)
            throw new CarRentalDataModifiedException(Em::CARRENTALDATAMODIFIED_EXC);
        $carrental = new CarRental;
        $carrental->user_id = $user_id;
        $carrental->car_name = $crtemp->car_name;
        $carrental->company_name = $crtemp->company_name;
        $carrental->age_range = $crtemp->age_range;
        $carrental->rentstart_date = $crtemp->rentstart_date;
        $carrental->rentend_date = $crtemp->rentend_date;
        $carrental->price = $crtemp->price;
        $saved = $carrental->save();
        if(!$saved)
            throw new DatabaseInsertionException(Em::CARRENTAL_NEWROW_EXC);
        $crtemp->delete();
        return $carrental;
    }

    /**
     * Set the response data for FlightController index method route
     * @param mixed $user_id
     * @return array
     */
    private function setIndexResponseData(mixed $user_id): array{
        $cars = CarRental::where('user_id',$user_id)
                ->orderByDesc('rentstart_date')
                ->get();
        if($cars->isNotEmpty()){
            return [
                C::KEY_CODE => 200,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => true, C::KEY_EMPTY => false, 'cars' => $cars
                ]
            ];
        }
        return [
            C::KEY_CODE => 200,
            C::KEY_RESPONSE => [
                C::KEY_DONE => true, C::KEY_EMPTY => true, C::KEY_MESSAGE => C::MESS_RENT_CARS_LIST_EMPTY
            ]
        ];
        
    }

    /**
     * Set the response data for the store route
     * @param CarRental $carrental the rented car model saved to the database
     * @return array an array with the info of the rented car
     */
    private function setStoreResponseData(CarRental $carrental): array{
        return [
            C::KEY_DONE => true,
            C::KEY_MESSAGE => "Per confermare la prenotazione dell'auto fai click su paga",
            'carrental' => $carrental
        ];
    }
}

?>
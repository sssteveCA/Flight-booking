<?php

namespace App\Traits\Common;

use App\Exceptions\CarRentalDataModifiedException;
use App\Exceptions\DatabaseInsertionException;
use App\Models\CarRental;
use App\Models\CarRentalTemp;
use App\Interfaces\ExceptionsMessages as Em;
use App\Interfaces\Constants as C;
use Exception;

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
     * Set the response data for destroy method
     * @param int $myCar rented car id
     * @param mixed $user_id the logged user id
     * @return array the response
     */
    private function setDestroyResponseData(int $myCar, mixed $user_id): array{
        $car = CarRental::find($myCar);
        if($car != null){
            if($car->user_id == $user_id){
                $delete = $car->delete();
                if($delete){
                    return [
                        C::KEY_CODE => 200,
                        C::KEY_RESPONSE => [
                            C::KEY_DONE => true, C::KEY_MESSAGE => C::OK_CARRENTALDELETED
                        ]
                    ];
                }
                return [ 
                    C::KEY_CODE => 500,
                    C::KEY_RESPONSE => [
                        C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_CARRENTAL_DELETE
                    ]
                 ];
            }
            return [ 
                C::KEY_CODE => 401,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
                ]
            ];
        }
        return [ 
            C::KEY_CODE => 404,
            C::KEY_RESPONSE => [
                C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_URLNOTFOUND_NOTALLOWED_API
            ]
        ];
    }

    /**
     * Set the response data for the index method
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
     * Set the response data for the show method
     * @param mixed $myCar
     * @param mixed $user_id
     * @param array $params
     * @return array
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    private function setShowResponseData(mixed $myCar, mixed $user_id, array $params): array{
        $car = CarRental::where('id',$myCar)->firstOrFail();
        if($user_id == $car->user_id){
            return [
                C::KEY_CODE => 200,
                C::KEY_RESPONSE => [
                    C::KEY_DONE => true, 'car' => $car
                ]
            ];
        }
        return [
            C::KEY_CODE => 401,
            C::KEY_RESPONSE => [
                C::KEY_DONE => false,
                C::KEY_MESSAGE => $params['messages']['error']
            ]
        ];
    }

    /** method route
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
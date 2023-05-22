<?php

namespace App\Traits\Common;

use App\Exceptions\CarRentalDataModifiedException;
use App\Exceptions\DatabaseInsertionException;
use App\Models\CarRental;
use App\Models\CarRentalTemp;
use App\Interfaces\ExceptionsMessages as Em;

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
}

?>
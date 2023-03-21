<?php

namespace App\Traits\Common;

use App\Interfaces\CarRental as Cr;
use Illuminate\Support\Facades\Log;

/**
 * This trait contains same code for CarRentalSearchController & CarRentalSearchControllerApi
 */
trait CarRentalSearchControllerCommonTrait{

    /**
     * Add the cars info to each company
     * @param $company_data the array with the company info to update
     * @return array
     */
    private function getCompanyCarFleet(array $company_data): array{
        $cars_array = [];
        $car_fleet_keys = array_keys(Cr::CAR_FLEET);
        $car_fleet_values = array_values(Cr::CAR_FLEET);
        foreach($company_data['cars'] as $car_num){
            $cars_array[$car_fleet_keys[$car_num]] = $car_fleet_values[$car_num];
        }
        //Log::channel('stdout')->info("CarRentalSearchControllerCommonTrait getCarRentalArray cars_array => ".var_export($cars_array,true));
        return $cars_array;
    }

    /**
     * Set the car rental information array
     * @return array
     */
    private function getRentalCarArray(): array{
        $companies_data = Cr::CARRENTAL_COMPANIES;
        foreach($companies_data as $key => $company_data){
            $companies_data[$key]['cars'] = $this->getCompanyCarFleet($company_data);
        }
        /* Log::channel('stdout')->info("CarRentalSearchControllerCommonTrait getCarRentalArray CARRENTAL_COMPANIES => ".var_export(Cr::CARRENTAL_COMPANIES,true)); */
        return [
            'age_ranges' => Cr::AGE_RANGES,
            'available_locations' => Cr::AVAILABLE_LOCATIONS,
            'companies_data' => $companies_data
        ];
    }

    

    
}
?>
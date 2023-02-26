<?php

namespace App\Traits\Common;

use App\Interfaces\CarRental as Cr;

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
        foreach($company_data['cars'] as $num_car){
            $cars_array[] = Cr::CAR_FLEET[$num_car];
        }
        return $cars_array;
    }

    /**
     * Set the car rental information for the response
     * @return array
     */
    private function getRentalCarData(): array{
        $companies_data = Cr::CARRENTAL_COMPANIES;
        foreach($companies_data as $key => $company_data){
            $companies_data[$key]['cars'] = $this->getCompanyCarFleet($company_data);
        }
        return [
            'age_ranges' => Cr::AGE_RANGES,
            'available_locations' => Cr::AVAILABLE_LOCATIONS,
            'companies_data' => $companies_data
        ];
    }

    
}
?>
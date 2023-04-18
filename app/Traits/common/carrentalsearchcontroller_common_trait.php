<?php

namespace App\Traits\Common;

use App\Classes\CarRentalPrice;
use App\Classes\Welcome\CarRentalTempManager;
use App\Interfaces\CarRental as Cr;
use Illuminate\Support\Facades\Log;
use App\Interfaces\Constants as C;

/**
 * This trait contains same code for CarRentalSearchController & CarRentalSearchControllerApi
 */
trait CarRentalSearchControllerCommonTrait{

    /**
     * Get the info about a booked car
     * @param array $inputs the data of the request
     * @return array an array that contains the data of the response
     */
    protected function getCarRentalPriceInfo(array $inputs): array{
        $carrentalprice = new CarRentalPrice([
            'car_name' => $inputs['car'],
            'car_rental_array' => $this->getRentalCarArray(),
            'company_name' => $inputs['rent_company'],
            'age_range' => $inputs['age_range'],
            'rentstart_date' => $inputs['rentstart'],
            'rentend_date' => $inputs['rentend']
        ]);
        $carrentaltemp_data = [
            'car_name' => $carrentalprice->getCarName(),
            'company_name' => $carrentalprice->getCompanyName(),
            'age_range' => $carrentalprice->getAgeRange(),
            'rentstart_date' => $carrentalprice->getRentStartDate(),
            'rentend_date' => $carrentalprice->getRentEndDate(),
            'price' => $carrentalprice->getTotalPrice(),
        ];
        $crtm = new CarRentalTempManager($carrentaltemp_data);
        $crtm->addCarRentalTemp();
        return [
            C::KEY_DONE => true,
            C::KEY_RESPONSE => [
                'carrental' => [
                    'session_id' => $crtm->getSessionId(),
                    'car_name' => $carrentalprice->getCarName(),
                    'company_name' => $carrentalprice->getCompanyName(),
                    'age_range' => $carrentalprice->getAgeRange(),
                    'rentstart_date' => $carrentalprice->getRentStartDate(),
                    'rentend_date' => $carrentalprice->getRentEndDate(),
                    'total_price' => sprintf("%.2f",$carrentalprice->getTotalPrice())
                ]
            ]
        ];
    }

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

    /**
     * Get the car companies list
     * @return array
     */
    private function getCompaniesList(): array{
        return array_keys($this->getRentalCarArray()['companies_data']);
    }

    /**
     * Get the car fleet of the indicated company
     * @param string $company the indicated company
     * @return array
     */
    private function getCompanyCarsList(string $company): array{
        return array_keys($this->getRentalCarArray()['companies_data'][$company]['cars']);
    }

    /**
     * Get the countries list where it's possible rent a car
     * @return array
     */
    private function getCountriesList(): array{
        return array_keys($this->getRentalCarArray()['available_locations']);
    }

    /**
     * Get the locations list of the indicated country where it's possible rent a car
     * @param string $country
     * @return array
     */
    private function getLocationsList(string $country): array{
        return array_keys($this->getRentalCarArray()['available_locations'][$country]);
    }

    /**
     * Get the possibile age ranges of user that rent a car
     * @return array
     */
    private function getAgeRangesList(){
        $age_ranges = $this->getRentalCarArray()['age_ranges'];
        $age_ranges_str_values = [];
        foreach($age_ranges as $age_range){
            $age_ranges_str_values[] = "{$age_range[0]}-{$age_range[1]}";
        }
        return $age_ranges_str_values;
    }

    

    
}
?>
<?php

namespace App\Traits\Common;

trait CarRentalPriceRequestCommonTrait{

    use CarRentalSearchControllerCommonTrait;

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
            $age_ranges_str_values[] = "{$age_range[0]}-{$age_range[1]} anni";
        }
        return $age_ranges_str_values;
    }
}
?>
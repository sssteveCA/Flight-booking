<?php

namespace App\Traits\Common;

use App\Interfaces\Hotels as H;

/**
 * This trait is used to store common code in HotelSearchController & HotelSearchControllerApi
 */
trait HotelSearchControllerCommonTrait{


    /**
     * Get the cities of a country that contains hotels list
     */
    protected function getCitiesList(string $country): array{
        if(isset(H::HOTELS_LIST[$country]))
            return array_keys(H::HOTELS_LIST[$country]);
        return [];
    }

    /**
     * Get the countries list that contains hotels
     */
    protected function getCountriesList(): array{
        return array_keys(H::HOTELS_LIST);
    }

    /**
     * Get the hotels list of a city's country
     */
    protected function getHotelsList(string $country, string $city): array{
        if(isset(H::HOTELS_LIST[$country])){
            if(isset(H::HOTELS_LIST[$country][$city])){
                $hotels_list = H::HOTELS_LIST[$country][$city];
                return array_keys($hotels_list);
            }
        }
        return [];
    }


}
?>
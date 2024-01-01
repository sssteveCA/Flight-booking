<?php

namespace App\Traits;

/**
 * Trait used by FlightEventFSeeder class
 */
trait FlightEventSeederTrait{

    /**
     * Get the flight events list array items that have informations
     * @param array $flightEventsList
     * @return array
     */
    private function getFilledFlightEvents(array $flightEventsList): array{
        $filteredArray = array_filter($flightEventsList, function($countryInfo,$country){
            $item = [];
            foreach($countryInfo as $city => $citiesInfo){
                if(!empty($citiesInfo)) $item = $countryInfo;
            }
            if(!empty($item)) return true;
            else return false;
        },ARRAY_FILTER_USE_BOTH);
        $filteredArrayKeys = array_keys($filteredArray);
        $mapArray = array_map(function($countryInfo,$country){
            foreach($countryInfo as $city => $cityInfo){
                foreach($cityInfo as $event => $eventInfo){
                    return [ 
                        'name' => $event,
                        'location' => $eventInfo['location'],
                        'gmLink' => $eventInfo['gmLink'],
                        'country' => $country,
                        'city' => $city,
                        'price' => $eventInfo['price'],
                        'image' => $eventInfo['image']
                    ];
                }
            }
        },$filteredArray,$filteredArrayKeys);
        return $mapArray;
    }

}

?>
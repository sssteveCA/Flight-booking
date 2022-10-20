<?php

namespace App\Traits\Common;

use App\Interfaces\Hotels as H;
use Illuminate\Http\Request;

/**
 * This trait is used to store common code in HotelSearchController & HotelSearchControllerApi
 */
trait HotelSearchControllerCommonTrait{

    /**
     * Get the countries list that contains hotels
     */
    public function getCountries(Request $request){
        $countries = $this->getCountriesList();
        return response()->json($countries,200,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }


    /**
     * Get the cities of a country that contains hotels list
     */
    public function getCities(Request $request){
        $country = $request->query('country','');
        $cities = $this->getCitiesList($country);
        if(sizeof($cities) > 0)
            $response_code = 200;
        else
            $response_code = 404;
        return response()->json($cities,$response_code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get the hotels list of a city's country
     */
    public function getHotels(Request $request){
        $country = $request->query('country','');
        $city = $request->query('city','');
        $hotels = $this->getHotelsList($country,$city);
        if(sizeof($hotels) > 0)
            $response_code = 200;
        else
            $response_code = 404;
        return response()->json($hotels,$response_code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get the info for specific hotel
     */
    public function getHotelInfo(Request $request){
        $country = $request->query('country','');
        $city = $request->query('city','');
        $hotel = $request->query('hotel','');
        $hotel_info = $this->getHoltelInfoList($country,$city,$hotel);
        if(sizeof($hotel_info) > 0)
            $response_code = 200;
        else
            $response_code = 404;
        return response()->json($hotel_info,$response_code,[],JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
    }

    protected function getCitiesList(string $country): array{
        if(isset(H::HOTELS_LIST[$country]))
            return array_keys(H::HOTELS_LIST[$country]);
        return [];
    }

    protected function getCountriesList(): array{
        return array_keys(H::HOTELS_LIST);
    }

    protected function getHotelsList(string $country, string $city): array{
        if(isset(H::HOTELS_LIST[$country])){
            if(isset(H::HOTELS_LIST[$country][$city])){
                $hotels_list = H::HOTELS_LIST[$country][$city];
                return array_keys($hotels_list);
            }
        }
        return [];
    }


    protected function getHoltelInfoList(string $country, string $city, string $hotel): array{
        if(isset(H::HOTELS_LIST[$country])){
            if(isset(H::HOTELS_LIST[$country][$city])){
                if(isset(H::HOTELS_LIST[$country][$city][$hotel])){
                    $hotel_info_list = H::HOTELS_LIST[$country][$city][$hotel];
                    return $hotel_info_list;
                }
            }
        }//if(isset(H::HOTELS_LIST[$country])){
        return [];
    }

    

    
}
?>
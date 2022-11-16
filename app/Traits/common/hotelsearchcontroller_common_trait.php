<?php

namespace App\Traits\Common;

use App\Interfaces\Hotels as H;
use Illuminate\Http\Request;

/**
 * This trait is used to store common code in HotelSearchController & HotelSearchControllerApi
 */
trait HotelSearchControllerCommonTrait{

    /**
     * Get all the bookable hotels with details
     * @return array
     */
    public function getAvailableHotels(Request $request): array{
        return $this->getAvailableHotelsArray();
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

    protected function getAvailableHotelsArray(): array{
        return H::HOTELS_LIST;
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
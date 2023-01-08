<?php

namespace App\Traits\Common;

use App\Classes\Welcome\HotelPrice;
use app\Classes\Welcome\HotelPriceTempManager;
use App\Interfaces\Hotels as H;
use Illuminate\Http\Request;
use App\Interfaces\Welcome\HotelPriceErrors as Hpe;
use App\Interfaces\Constants as C;

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

    /**
     * Get the info about a booked hotel room
     * @param array $inputs the data of the request
     * @return array an array that contains the data of the response
     */
    protected function getHotelPriceInfo(array $inputs): array{
        $hotelPrice = new HotelPrice($inputs);
        $errnoHp = $hotelPrice->getErrno();
        switch($errnoHp){
            case 0:
                $hotel_data = [
                    'country' => $hotelPrice->getCountry(), 'city' => $hotelPrice->getCity(), 'hotel' => $hotelPrice->getHotel(),
                    'checkin' => $hotelPrice->getCheckin(), 'checkout' => $hotelPrice->getCheckout(), 'people' => $hotelPrice->getPeople(),
                    'rooms' => $hotelPrice->getRooms(), 'price' => $hotelPrice->getFullPrice()
                ];
                $response_array = [
                    C::KEY_DONE => true,
                    'response' => [ 
                        'hotel' => $hotel_data
                    ]   
                ];
                $hptm_params = $response_array["response"]["hotel"];
                $hptm = new HotelPriceTempManager($hptm_params);
                //Log::channel('stdout')->info("HotelSearchController after HotelPriceTempManager");
                $hptm->addHotelPriceTemp();
                $response_array['response']['session_id'] = $hptm->getSessionId();
                $response_code = 201;
                break;
            case Hpe::TOOMANYPEOPLE_FOR_ROOMS:
                $response_array = [
                    C::KEY_DONE => false, C::KEY_MESSAGE => $hotelPrice->getError()];
                $response_code = 400;
                break;
            default:
                $response_array = [
                    C::KEY_DONE => false, C::KEY_MESSAGE => C::ERR_HOTEL_PREVENTIVE];
                $response_code = 500;
                break;
        }
        return [
            "response_array" => $response_array, "response_code" => $response_code
        ];
    }

    

    
}
?>

import HotelsAvailable from "./classes/hotel/hotelsavailable";
import HotelsAvailableInterface from "./interfaces/hotel/hotelsavailable.interface";

export function loadHotelInfo(): void{
    let ha_data: HotelsAvailableInterface = {
        hotel_countries_id: 'hotelCountries', hotel_cities_id: 'hotelCities', hotels_list_id: 'hotelsList', hotel_info_id: 'hotel_info_result', hotel_info_images_id: 'hotel_info_images'
    };
    let ha: HotelsAvailable = new HotelsAvailable(ha_data);
    ha.hotelsAvailable();
}

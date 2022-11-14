import NoArgumentError from "./classes/errors/noargumenterror";
import HotelCitiesCountry from "./classes/hotel/hotelcitiescountry";
import HotelCountries from "./classes/hotel/hotelcountries";
import HotelInfo from "./classes/hotel/hotelinfo";
import HotelsAvailable from "./classes/hotel/hotelsavailable";
import HotelsCity from "./classes/hotel/hotelscity";
import HotelCitiesCountryInterface from "./interfaces/hotel/hotelcitiescountry.interface";
import HotelCountriesInterface from "./interfaces/hotel/hotelcountries.interface";
import HotelInfoInterface from "./interfaces/hotel/hotelinfo.interface";
import HotelsAvailableInterface from "./interfaces/hotel/hotelsavailable.interface";
import HotelsCityInterface from "./interfaces/hotel/hotelscity.interface";

namespace Globals{
    export let hc: HotelCountries;
    export let hcc: HotelCitiesCountry;
    export let hCity: HotelsCity;
    export let hi: HotelInfo;
}

export function loadHotelInfo(): void{
    let ha_data: HotelsAvailableInterface = {
        hotel_countries_id: 'hotelCountries', hotel_cities_id: 'hotelCities', hotels_list_id: 'hotelsList', hotel_info_id: 'hotel_info_result'
    };
    let ha: HotelsAvailable = new HotelsAvailable(ha_data);
    ha.hotelsAvailable();
}

import HotelCitiesCountry from "./classes/hotel/hotelcitiescountry";
import HotelCountries from "./classes/hotel/hotelcountries";
import HotelsCity from "./classes/hotel/hotelscity";
import HotelCitiesCountryInterface from "./interfaces/hotel/hotelcitiescountry.interface";
import HotelCountriesInterface from "./interfaces/hotel/hotelcountries.interface";
import HotelsCityInterface from "./interfaces/hotel/hotelscity.interface";

export function loadHotelData(): void{
    let hc_data: HotelCountriesInterface = {
        select_id: 'hotelCountries'
    };
    let hc: HotelCountries = new HotelCountries(hc_data);
    let hcc: HotelCitiesCountry;
    let hcity: HotelsCity;
    hc.get_hotel_countries().then(countries => {
        //console.log("countries");
        //console.log(countries);
        let hcc_data: HotelCitiesCountryInterface = {
            country: countries[0],
            select_id: 'hotelCities',
        };
        hcc = new HotelCitiesCountry(hcc_data);
        return hcc.get_hotel_cities_country();
    }).then(cities => {
        //console.log("cities");
        //console.log(cities);
        let hcity_data: HotelsCityInterface = {
            city: cities[0],
            country: hc.countries[0],
            select_id: 'hotelsList'
        };
        hcity = new HotelsCity(hcity_data);
        return hcity.get_hotels_city();
    }).then(hotels => {
        //console.log("hotels");
        //console.log(hotels);
    }).catch(err => {

    });
}
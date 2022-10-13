import HotelCitiesCountry from "./classes/hotel/hotelcitiescountry";
import HotelCountries from "./classes/hotel/hotelcountries";
import HotelCitiesCountryInterface from "./interfaces/hotel/hotelcitiescountry.interface";
import HotelCountriesInterface from "./interfaces/hotel/hotelcountries.interface";

export function loadHotelData(): void{
    let hc_data: HotelCountriesInterface = {
        select_id: 'hotelCountries'
    };
    let hc: HotelCountries = new HotelCountries(hc_data);
    hc.get_hotel_countries().then(countries => {
        console.log("countries");
        console.log(countries);
        let hcc_data: HotelCitiesCountryInterface = {
            country: countries[0],
            select_id: 'hotelCities',
        };
        let hcc: HotelCitiesCountry = new HotelCitiesCountry(hcc_data);
        return hcc.get_hotel_cities_country();
    }).then(cities => {
        console.log("cities");
        console.log(cities);
    }).catch(err => {

    });
}
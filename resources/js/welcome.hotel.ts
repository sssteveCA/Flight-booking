import HotelCountries from "./classes/hotel/hotelcountries";
import HotelCountriesInterface from "./interfaces/hotel/hotelcountries.interface";

export function loadHotelData(): void{
    let hc_data: HotelCountriesInterface = {
        select_id: 'hotelCountries'
    };
    let hc: HotelCountries = new HotelCountries(hc_data);
    hc.get_hotel_countries().then(countries => {
        console.log("countries");
        console.log(countries);
    }).catch(err => {

    });
}
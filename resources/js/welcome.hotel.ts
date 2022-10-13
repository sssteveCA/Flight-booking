import NoArgumentError from "./classes/errors/noargumenterror";
import HotelCitiesCountry from "./classes/hotel/hotelcitiescountry";
import HotelCountries from "./classes/hotel/hotelcountries";
import HotelsCity from "./classes/hotel/hotelscity";
import HotelCitiesCountryInterface from "./interfaces/hotel/hotelcitiescountry.interface";
import HotelCountriesInterface from "./interfaces/hotel/hotelcountries.interface";
import HotelsCityInterface from "./interfaces/hotel/hotelscity.interface";

namespace Globals{
    export let hc: HotelCountries;
    export let hcc: HotelCitiesCountry;
    export let hCity: HotelsCity;
}


export function loadHotelData(): void{
    let hc_data: HotelCountriesInterface = {
        select_id: 'hotelCountries'
    };
    Globals.hc = new HotelCountries(hc_data);
    let hcity: HotelsCity;
    Globals.hc.get_hotel_countries().then(countries => {
        if(countries.length <= 0)throw new NoArgumentError("");
        //console.log("countries");
        //console.log(countries);
        let hcc_data: HotelCitiesCountryInterface = {
            country: countries[0],
            select_id: 'hotelCities',
        };
        Globals.hcc = new HotelCitiesCountry(hcc_data);
        return Globals.hcc.get_hotel_cities_country();
    }).then(cities => {
        if(cities.length <= 0)throw new NoArgumentError("");
        //console.log("cities");
        //console.log(cities);
        let hCity_data: HotelsCityInterface = {
            city: cities[0],
            country: Globals.hc.countries[0],
            select_id: 'hotelsList'
        };
        Globals.hCity = new HotelsCity(hCity_data);
        return Globals.hCity.get_hotels_city();
    }).then(hotels => {
        //console.log("hotels");
        //console.log(hotels);
        hotelSelectsEvent();
    }).catch(err => {

    });
}

function hotelSelectsEvent(): void{
    Globals.hc.select_elem.on('change', (e)=>{
        //Select dropdown countries change
        let select = $(e.target);
        let country: string = select.val() as string;
        let hcc_data: HotelCitiesCountryInterface = {
            country: country,
            select_id: 'hotelCities',
        };
        Globals.hcc = new HotelCitiesCountry(hcc_data);
        Globals.hcc.get_hotel_cities_country().then(res => {
            Globals.hcc.select_elem.trigger('change');
        });
    });
    Globals.hcc.select_elem.on('change',(e)=>{
        //Select dropdown cities change
        let select = $(e.target);
        let country: string = Globals.hc.select_elem.val() as string;
        let city: string = select.val() as string;
        let hCity_data: HotelsCityInterface = {
            city: city,
            country: country,
            select_id: 'hotelsList'
        };
        Globals.hCity = new HotelsCity(hCity_data);
        Globals.hCity.get_hotels_city();
    });
}
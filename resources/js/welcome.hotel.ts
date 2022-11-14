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
            country: Globals.hc.countries[0],
            city: cities[0],
            select_id: 'hotelsList'
        };
        Globals.hCity = new HotelsCity(hCity_data);
        return Globals.hCity.get_hotels_city();
    }).then(hotels => {
        let hi_data: HotelInfoInterface = {
            country: Globals.hc.countries[0],
            city: Globals.hcc.cities[0],
            hotel: hotels[0],
            container_id: 'hotel_info_result'
        };
        Globals.hi = new HotelInfo(hi_data);
        return Globals.hi.get_hotel_info();
    }).then(hotel_info => {
        //console.log("hotels");
        //console.log(hotels);
        hotelSelectsEvent();
    }).catch(err => {
        console.warn(err);
    });
}

function hotelSelectsEvent(): void{
    Globals.hc.select_elem.on('change', (e)=>{
        //Select dropdown countries change
        let select = $(e.target);
        let country: string = select.val() as string;
        let hcc_data: HotelCitiesCountryInterface = {
            country: country, select_id: 'hotelCities',
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
            city: city, country: country, select_id: 'hotelsList'
        };
        Globals.hCity = new HotelsCity(hCity_data);
        Globals.hCity.get_hotels_city().then(res => {
            Globals.hCity.select_elem.trigger('change');
        });
    });
    Globals.hCity.select_elem.on('change',(e)=>{
        let select = $(e.target);
        let country: string = Globals.hc.select_elem.val() as string;
        let city: string = Globals.hcc.select_elem.val() as string;
        let hotel: string = select.val() as string;
        let hi_data: HotelInfoInterface = {
            country: country, city: city, hotel: hotel, container_id: "hotel_info_result"
        };
        /* console.log("HotelInfo");
        console.log(hi_data); */
        Globals.hi = new HotelInfo(hi_data);
        Globals.hi.get_hotel_info();
    });
}
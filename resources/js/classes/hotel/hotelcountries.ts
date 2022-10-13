import HotelCountriesInterface from "../../interfaces/hotel/hotelcountries.interface";

export default class HotelCountries{
    private _select_id: string;
    private _countries: Array<string> = [];

    private static FETCH_URL: string = "/hotelcountries";

    constructor(data: HotelCountriesInterface){
        this._select_id = data.select_id;
    }

    get select_id(){return this._select_id;}
    get countries(){return this._countries;}
}
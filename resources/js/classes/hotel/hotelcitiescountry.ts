import HotelCitiesCountryInterface from "../../interfaces/hotel/hotelcitiescountry.interface";

export default class HotelCitiesCountry{
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;

    constructor(data: HotelCitiesCountryInterface){
        this._country = data.country;
        this._select_id = data.select_id;
        this._select_elem = $('#'+this._select_id);
    }

    get country(){return this._country;}
    get select_id(){return this._select_id;}
    get select_elem(){return this._select_elem;}
}
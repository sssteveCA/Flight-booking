import HotelsCityInterface from "../../interfaces/hotel/hotelscity.interface";

export default class HotelsCity{
    private _city: string;
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;
    private _hotels: string[] = [];

    constructor(data: HotelsCityInterface){
        this._city = data.city;
        this._country = data.country;
        this._select_id = data.select_id;
        this._select_elem = $('#'+this._select_id);
    }

    get city(){return this._city;}
    get country(){return this._country;}
    get select_id(){return this._select_id;}
    get select_elem(){return this._select_elem;}
    get hotels(){return this._hotels;}
}
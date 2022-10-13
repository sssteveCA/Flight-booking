import HotelCountriesInterface from "../../interfaces/hotel/hotelcountries.interface";
import HotelCitiesCountry from "./hotelcitiescountry";

export default class HotelCountries{
    private _select_id: string;
    private _countries: Array<string> = [];
    private _select_elem: JQuery;
    private _errno: number = 0;
    private _error: string|null = null;

    private static FETCH_URL: string = "/hotelcountries";

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelCountriesInterface){
        this._select_id = data.select_id;
        this._select_elem = $('#'+this._select_id);
    }

    get select_id(){return this._select_id;}
    get countries(){return this._countries;}
    get select_elem(){return this._select_elem;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case HotelCountries.ERR_FETCH:
                this._error = HotelCountries.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
        }
        return this._error;
    }

    /**
     * Request to get all the countries selectable to choose the hotel
     * @returns the list of countries
     */
    public async get_hotel_countries(): Promise<Array<string>>{
        let countries: Array<string> = [];
        this._errno = 0;
        try{
            await this.get_hotel_countries_promise().then(res => {
                //console.log(res);
                countries = res;
                this._countries = countries;
            }).catch(err => {
                throw err;
            });
        }catch(e){
            this._errno = HotelCitiesCountry.ERR_FETCH;
            console.warn(e);
        }
        return countries;
    }

    private async get_hotel_countries_promise(): Promise<Array<string>>{
        return await new Promise<Array<string>>((resolve, reject) => {
            fetch(HotelCountries.FETCH_URL,{
                headers: {'Content-Type':'application/json'}}).then(res => {
                    resolve(res.json());
                }).catch(err => {
                    reject(err);
                });
        });
    }
}
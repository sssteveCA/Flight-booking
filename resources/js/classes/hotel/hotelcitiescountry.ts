import HotelCitiesCountryInterface from "../../interfaces/hotel/hotelcitiescountry.interface";

export default class HotelCitiesCountry{
    private _cities: string[] = [];
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;

    private static FETCH_URL: string = "/hotelcities";

    constructor(data: HotelCitiesCountryInterface){
        this._country = data.country;
        this._select_id = data.select_id;
        this._select_elem = $('#'+this._select_id);
    }

    get cities(){return this._cities;}
    get country(){return this._country;}
    get select_id(){return this._select_id;}
    get select_elem(){return this._select_elem;}

    /**
     * Get the cities of a particular country that have hotels to book
     * @returns the cities list 
     */
    public async get_hotel_cities_country(): Promise<string[]>{
        let cities: string[] = [];
        try{
            await this.get_hotel_cities_country_promise().then(res => {
                cities = res;
                this._cities = cities;
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
        }
        return cities;
    };

    private async get_hotel_cities_country_promise(): Promise<string[]>{
        return await new Promise<string[]>((resolve, reject) => {
            fetch(HotelCitiesCountry.FETCH_URL+"?country="+this._country,{
                headers: {'Content-Type': 'application/json'}
            }).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
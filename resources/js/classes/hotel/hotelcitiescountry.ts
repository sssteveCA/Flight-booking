import HotelCitiesCountryInterface from "../../interfaces/hotel/hotelcitiescountry.interface";

export default class HotelCitiesCountry{
    private _cities: string[] = [];
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;
    private _select_html: string;
    private _errno: number = 0;
    private _error: string|null = null;

    private static FETCH_URL: string = "/hotelcities";

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelCitiesCountryInterface){
        this._country = data.country;
        this._select_id = data.select_id;
        this._select_elem = $('#'+this._select_id);
    }

    get cities(){return this._cities;}
    get country(){return this._country;}
    get select_id(){return this._select_id;}
    get select_elem(){return this._select_elem;}
    get select_html(){return this._select_html;}
    get error(){
        switch(this._errno){
            case HotelCitiesCountry.ERR_FETCH:
                this._error = HotelCitiesCountry.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
        }
        return this._error;
    }

    /**
     * Get the cities of a particular country that have hotels to book
     * @returns the cities list 
     */
    public async get_hotel_cities_country(): Promise<string[]>{
        let cities: string[] = [];
        this._errno = 0;
        try{
            await this.get_hotel_cities_country_promise().then(res => {
                cities = res;
                this._cities = cities;
                this.set_select_html();
            }).catch(err => {
                throw err;
            });
        }catch(e){
            this._errno = HotelCitiesCountry.ERR_FETCH;
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

    private set_select_html(): void{
        this._select_html = ``;
        this._cities.forEach(city => {
            this._select_html += `<option value="${city}">${city}</option>`;
        });
        this._select_elem.html(this._select_html);
    }
}
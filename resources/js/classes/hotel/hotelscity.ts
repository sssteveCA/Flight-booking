import HotelsCityInterface from "../../interfaces/hotel/hotelscity.interface";

export default class HotelsCity{
    private _city: string;
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;
    private _select_html: string;
    private _hotels: string[] = [];
    private _errno: number = 0;
    private _error: string|null = null;

    private static FETCH_URL: string = "/hotelsearch";

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

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
    get select_html(){return this._select_html;}
    get hotels(){return this._hotels;}
    get error(){
        switch(this._errno){
            case HotelsCity.ERR_FETCH:
                this._error = HotelsCity.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
        }
        return this._error;
    }

    /**
     * Get the bookable hotels of a specified city and specific country
     * @returns 
     */
    public async get_hotels_city(): Promise<string[]>{
        let hotels: string[] = [];
        this._errno = 0;
        try{
            await this.get_hotels_city_promise().then(res => {
                hotels = res;
                this._hotels = hotels;
                this.set_select_html();
            }).catch(err => {
                throw err;
            });
        }catch(e){
            this._errno = HotelsCity.ERR_FETCH;
            console.warn(e);
        }
        return hotels; 
    }

    private async get_hotels_city_promise(): Promise<string[]>{
        return await new Promise<string[]>((resolve, reject)=>{
            fetch(`${HotelsCity.FETCH_URL}?country=${this._country}&city=${this._city}`,{
                headers:{'Content-Type': 'application/json'}
            }).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
    }

    private set_select_html(): void{
        this._select_html = ``;
        this._hotels.forEach(hotel => {
            this._select_html += `<option value="${hotel}">${hotel}</option>`;
        });
        this._select_elem.html(this._select_html);
    }
}
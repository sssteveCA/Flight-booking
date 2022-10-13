import HotelsCityInterface from "../../interfaces/hotel/hotelscity.interface";

export default class HotelsCity{
    private _city: string;
    private _country: string;
    private _select_id: string;
    private _select_elem: JQuery;
    private _hotels: string[] = [];

    private static FETCH_URL: string = "/hotelsearch";

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

    /**
     * Get the bookable hotels of a specified city and specific country
     * @returns 
     */
    public async get_hotels_city(): Promise<string[]>{
        let hotels: string[] = [];
        try{
            await this.get_hotels_city_promise().then(res => {
                hotels = res;
                this._hotels = hotels;
            }).catch(err => {
                throw err;
            });
        }catch(e){
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
}
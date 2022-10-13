import HotelCountriesInterface from "../../interfaces/hotel/hotelcountries.interface";

export default class HotelCountries{
    private _select_id: string;
    private _countries: Array<string> = [];
    private _select_elem: JQuery;

    private static FETCH_URL: string = "/hotelcountries";

    constructor(data: HotelCountriesInterface){
        this._select_id = data.select_id;
        //this._select_elem = $('#'+this._select_id);
    }

    get select_id(){return this._select_id;}
    get countries(){return this._countries;}
    get select_elem(){return this._select_elem;}

    /**
     * Request to get all the countries selectable to choose the hotel
     * @returns the list of countries
     */
    public async get_hotel_countries(): Promise<Array<string>>{
        try{
            await this.get_hotel_countries_promise().then(res => {
                //console.log(res);
                this._countries = res;
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
        }
        return this._countries;
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
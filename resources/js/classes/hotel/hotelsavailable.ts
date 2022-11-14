import HotelsAvailableInterface from "../../interfaces/hotel/hotelsavailable.interface";
import { Constants } from "../../values/constants";

export default class HotelsAvailable{
    private _hotel_countries_el: JQuery<HTMLSelectElement>;
    private _hotel_cities_el: JQuery<HTMLSelectElement>;
    private _hotels_list_el: JQuery<HTMLSelectElement>;
    private _hotels: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT: string = Constants.URL_HOTELS_AVAILABLE;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelsAvailableInterface){
        this.assignValues(data);
    }

    get hotels(){ return this._hotels; }
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case HotelsAvailable.ERR_FETCH:
                this._error = HotelsAvailable.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    private assignValues(data: HotelsAvailableInterface): void{
        this._hotel_countries_el = $('#'+data.hotel_countries_id);
        this._hotel_cities_el = $('#'+data.hotel_cities_id);
        this._hotels_list_el = $('#'+data.hotels_list_id);
    }

    public async hotelsAvailable(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.hotelsAvailablePromise().then(res => {
                response = JSON.parse(res);
                this._hotels = response;
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
            this._errno = HotelsAvailable.ERR_FETCH;
        }
        return response;
    }

    private async hotelsAvailablePromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            fetch(HotelsAvailable.URL_SCRIPT).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
import HotelsAvailableInterface from "../../interfaces/hotel/hotelsavailable.interface";

export default class HotelsAvailable{
    private _hotel_countries_el: JQuery<HTMLSelectElement>;
    private _hotel_cities_el: JQuery<HTMLSelectElement>;
    private _hotels_list_el: JQuery<HTMLSelectElement>;
    private _hotels: object;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH:number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelsAvailableInterface){

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
}
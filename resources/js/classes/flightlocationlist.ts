//This class provides suggestion for flight locations in welcome blade flights tab

import FlightLocationListInterface from "../interfaces/flightlocationlist.interface";
import { Constants } from "../values/constants";

export default class FlightLocationList{
    private _fired: JQuery<HTMLElement>;
    private _query: string;
    private _datalist: JQuery<HTMLDataElement>;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH:number = 1;

    public static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(data: FlightLocationListInterface){
        this._fired = data.fired;
        this._query = data.query;
    }

    get fired(){return this._fired;}
    get query(){return this._query;}
    get datalist(){return this._datalist;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case FlightLocationList.ERR_FETCH:
                this._error = FlightLocationList.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async get_suggestions(): Promise<string>{
        this._errno = 0;
        let fetch_url = Constants.URL_FLIGHTSEARCH+'/'+this._query;
        let promise = await new Promise<string>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.text());
            }).catch(err => {
                this._errno = FlightLocationList.ERR_FETCH;
                reject(err);
            });
        });
        return promise;
    }

}
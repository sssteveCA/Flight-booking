//This class provides suggestion for flight locations in welcome blade flights tab

import FlightLocationCountriesInterface from "../interfaces/flightlocationcountries.interface";
import { Constants } from "../values/constants";

export default class FlightLocationList{
    private _fired: JQuery<HTMLElement>;
    private _query: string;
    private _datalist: JQuery<HTMLDataElement>;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH:number = 1;

    public static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(){  
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

    private async get_countries_suggestions_promise(): Promise<any>{
        this._errno = 0;
        let fetch_url = Constants.URL_FLIGHTSEARCH+'/?query='+this._query;
        let promise = await new Promise<any>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.json());
            }).catch(err => {
                this._errno = FlightLocationList.ERR_FETCH;
                reject(err);
            });
        });
        return promise;
    }

    public set_datalist(list: object): void{
        let input_id = this._fired.attr('id');
        this._datalist = $('#'+input_id+'-list');
        this._datalist.html('');
        for(const key in list){
            let option = $('<option>');
            option.attr('value',key);
            this._datalist.append(option);
        }//for(const key in list){
    }

    public get_countries_suggestions(data: FlightLocationCountriesInterface): boolean{
        let ok = false;
        this._errno = 0;
        this._fired = data.fired;
        this._query = data.query;
        this.get_countries_suggestions_promise().then(res => {
            this.set_datalist(res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH;
            console.warn(err);
        });
        return ok;
    }

}
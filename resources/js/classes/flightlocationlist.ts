//This class provides suggestion for flight locations in welcome blade flights tab

import FlightLocationCountriesInterface from "../interfaces/flightlocationcountries.interface";
import FlightLocationAirportsInterface from "../interfaces/flightlocationairports.interface";
import { Constants } from "../values/constants";

export default class FlightLocationList{
    private _fired: JQuery<HTMLElement>;
    private _query: string;
    private _country: string;
    private _selects: JQuery;
    private _id_from_select: string;
    private _id_to_select: string;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH:number = 1;

    public static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(){  
    }

    get fired(){return this._fired;}
    get query(){return this._query;}
    get country(){return this._country;}
    get id_from_select(){return this._id_from_select;}
    get id_to_select(){return this._id_to_select;}
    get selects(){return this._selects;}
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

    public get_country_airports(data: FlightLocationAirportsInterface): boolean{
        let ok = false;
        this._errno = 0;
        this._fired = data.fired;
        this._country = data.country;

        this.get_country_airports_promise().then(res => {
            console.log(res);
            this.set_airports(this._id_from_select,res);
            this.set_airports(this._id_to_select,res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH;
            console.warn(err);
        })
        return ok;
    }

    private async get_country_airports_promise(): Promise<any>{
        let fetch_url = Constants.URL_AIRPORTSSEARCH+'/?country='+this._country;
        let promise = await new Promise<any>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
        return promise;
    }

    public get_countries_suggestions(data: FlightLocationCountriesInterface): boolean{
        let ok = false;
        this._errno = 0;
        this._id_from_select = data.id_from_select;
        this._id_to_select = data.id_to_select;
        this.get_countries_suggestions_promise().then(res => {
            //console.log(res);
            this.set_countries_select(this._id_from_select,res);
            this.set_countries_select(this._id_to_select,res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH;
            console.warn(err);
        });
        return ok;
    }

    private async get_countries_suggestions_promise(): Promise<any>{
        let fetch_url = Constants.URL_FLIGHTSEARCH;
        let promise = await new Promise<any>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
        return promise;
    }

    private set_countries_select(id: string,list: Array<string>): void{
        //console.log(list);
        let select = $('#'+id);
        select.html('');
        list.forEach((country,ci)=>{
            /* console.log("country");
            console.log(country); */
            let option = $('<option>');
            option.text(country);
            option.attr('value',country);
            $(select).append(option);
        });
        $('#'+id+'-airports')
    }

    private set_airports(id: string,list: Array<string>): void{
       let select = $('#'+id+'-airports');
       for(const airport in list){
            let option = $('<option>');
            option.text(airport);
            option.attr('value',airport);
            $(select).append(option);
       }
    }


}
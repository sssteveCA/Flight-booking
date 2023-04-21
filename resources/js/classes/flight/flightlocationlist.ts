//This class provides suggestion for flight locations in welcome blade flights tab

import FlightLocationCountriesInterface from "../../interfaces/flight/flightlocationcountries.interface";
import FlightLocationAirportsInterface from "../../interfaces/flight/flightlocationairports.interface";
import FlightLocationCompaniesInterface from "../../interfaces/flight/flightlocationcompanies.interface";
import { Constants } from "../../values/constants";

export default class FlightLocationList{
    private _fired: JQuery<HTMLElement>;
    private _query: string;
    private _country: string; //Country which the airport is
    private _selects: JQuery;
    private _id_companies_select: string; //select item id for company names list
    private _id_from_select: string; //select item id for departure countries list
    private _id_to_select: string; //select item id for arrival countries list
    private _errno: number = 0;
    private _error: string|null = null;

    //Urls that this script calls
    private static AIRPORTS_URL: string = '/airportsearch';
    private static COUNTRIES_URL: string = '/flightsearch';
    private static COMPANIES_URL: string = '/companieslist';

    public static ERR_FETCH_COUNTRIES:number = 1;
    public static ERR_FETCH_AIRPORTS:number = 2;
    public static ERR_FETCH_COMPANIES:number = 3;

    public static ERR_FETCH_COUNTRIES_MSG:string = "Errore durante l'esecuzione della richiesta per la lista dei paesi";
    public static ERR_FETCH_AIRPORTS_MSG:string = "Errore durante l'esecuzione della richiesta per la lista degli aereoporti del paese selezionato";
    public static ERR_FETCH_COMPANIES_MSG:string = "Errore durante l'esecuzione della richiesta per la lista compagnie aeree";

    constructor(){  
    }

    get fired(){return this._fired;}
    get query(){return this._query;}
    get country(){return this._country;}
    get id_companies_select(){return this._id_companies_select;}
    get id_from_select(){return this._id_from_select;}
    get id_to_select(){return this._id_to_select;}
    get selects(){return this._selects;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case FlightLocationList.ERR_FETCH_COUNTRIES:
                this._error = FlightLocationList.ERR_FETCH_COUNTRIES_MSG;
                break;
            case FlightLocationList.ERR_FETCH_AIRPORTS:
                this._error = FlightLocationList.ERR_FETCH_AIRPORTS_MSG;
                break;
            case FlightLocationList.ERR_FETCH_COMPANIES:
                this._error = FlightLocationList.ERR_FETCH_COMPANIES_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    /**
     * Get airports located in selected country
     * @param data 
     * @returns 
     */
    public get_country_airports(data: FlightLocationAirportsInterface): boolean{
        let ok = false;
        this._errno = 0;
        this._country = data.country;
        if(data.id_from_select !== undefined)this._id_from_select = data.id_from_select;
        if(data.id_to_select !== undefined)this._id_to_select = data.id_to_select;
        //If these properties are setted
        this.get_country_airports_promise().then(res => {
            if(this._id_from_select)this.set_airports_select(this._id_from_select,res);
            if(this._id_to_select)this.set_airports_select(this._id_to_select,res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH_AIRPORTS;
            console.warn(err);
        });
        return ok;
    }

    private async get_country_airports_promise(): Promise<any>{
        //let fetch_url = Constants.URL_AIRPORTSSEARCH+'/?country='+this._country;
        let fetch_url = FlightLocationList.AIRPORTS_URL+'?country='+this._country;
        let promise = await new Promise<any>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
        return promise;
    }

    public async get_flight_companies(data: FlightLocationCompaniesInterface): Promise<boolean>{
        let ok = false;
        this._errno = 0;
        this._id_companies_select = data.id_companies_select;
        await this.get_flight_companies_promise().then(res => {
            this.set_companies_select(res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH_COMPANIES;
            console.warn(err);
        });
        return ok;
    }

    private async get_flight_companies_promise(): Promise<any>{
        let fetch_url = FlightLocationList.COMPANIES_URL;
        let promise = await new Promise((resolve,reject) =>{
            fetch(fetch_url).then(res =>{
                resolve(res.json());
            }).catch(err =>{
                reject(err);
            });
        });
        return promise;
    }

    /**
     * Get available countries list
     * @param data 
     * @returns 
     */ 
    public async get_countries(data: FlightLocationCountriesInterface): Promise<boolean>{
        let ok = false;
        this._errno = 0;
        this._id_from_select = data.id_from_select;
        this._id_to_select = data.id_to_select;
        await this.get_countries_promise().then(res => {
            this.set_countries_select(this._id_from_select,res);
            this.set_countries_select(this._id_to_select,res);
            ok = true;
        }).catch(err => {
            this._errno = FlightLocationList.ERR_FETCH_COUNTRIES;
            console.warn(err);
        });
        return ok;
    }

    private async get_countries_promise(): Promise<any>{
        let fetch_url = FlightLocationList.COUNTRIES_URL;
        let promise = await new Promise<any>((resolve,reject)=>{
            fetch(fetch_url).then(res => {
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
        return promise;
    }

    private set_airports_select(id: string,list: Array<string>): void{
        let select = $('#'+id+'-airports');
        select.html('');
        for(const airport in list){
             let option = $('<option>');
             option.text(airport);
             option.attr('value',airport);
             $(select).append(option);
        }
     }

     private set_companies_select(list: Array<string>): void{
        let select = $('#'+this._id_companies_select);
        select.html('');
        list.forEach((company) =>{
            let option = $('<option>');
            option.text(company);
            option.attr('value',company);
            $(select).append(option);
        });
     }

    private set_countries_select(id: string,list: Array<string>): void{
        let select = $('#'+id);
        select.html('');
        list.forEach((country)=>{
            let option = $('<option>');
            option.text(country);
            option.attr('value',country);
            $(select).append(option);
        });
    }

    


}
//This class provides suggestion for flight locations in welcome blade flights tab

import FlightLocationListInterface from "../interfaces/flightlocationlist.interface";

export default class FlightLocationList{
    private _fired: JQuery<HTMLElement>;
    private _query: string;
    private _errno: number = 0;
    private _error: string|null = null;

    constructor(data: FlightLocationListInterface){
        this._fired = data.fired;
        this._query = data.query;
    }

    get fired(){return this._fired;}
    get query(){return this._query;}
    get errno(){return this._errno;}
    get error(){return this._error;}

    private get_suggestions(): void{

    }
}
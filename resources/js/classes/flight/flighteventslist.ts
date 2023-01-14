import FlightEvent from "./flightevent";
import {Constants} from "../../values/constants";
import HtmlCardInterface from "../../interfaces/htmlcard.interface";
import FlightEventInterface from "../../interfaces/flight/flightevent.interface";
import {Config} from "../../../../config";
import FlightEventsHtml from "./flighteventshtml";


export default class FlightEventsList{
    private _errno: number = 0;
    private _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Impossibile mostrare gli eventi. Se il problema persiste, contattare l' amministratore del sito.";

    private static SCRIPT_URL: string = '/flightevents';

    constructor(){
    }

    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case FlightEventsList.ERR_SCRIPT_EXCEPTION:
                this._error = FlightEventsList.ERR_SCRIPT_EXCEPTION_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    async flight_events_request(): Promise<boolean>{
        let ok:boolean = false;
        this._errno = 0;
        let json = {};
        //console.log("Prima della promise");
        await this.flight_event_request_promise().then(res => {
            //console.log(res);
            json = JSON.parse(res);
            //console.log(this._flight_events);
            ok = true;
        }).catch(err => {
            console.warn(err);
            this._errno = FlightEventsList.ERR_SCRIPT_EXCEPTION;
            json = { done: false, empty: false, message: this.error };
        }).finally(()=> {
            let feh: FlightEventsHtml = new FlightEventsHtml(json);
        })
        return ok;
    }

    private async flight_event_request_promise(): Promise<string>{
        return await new Promise<string>((resolve,reject) => {
            fetch(FlightEventsList.SCRIPT_URL).then(res => {
                resolve(res.text());
            }).catch(err =>{
                reject(err);
            });
        });
    }
}
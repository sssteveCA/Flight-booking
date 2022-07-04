import FlightEvent from "./flightevent";
import {Constants} from "../values/constants";

export default class FlightEventsList{
    _flight_events: Array<FlightEvent> = new Array();
    _errno: number = 0;
    _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = 'Errore durante l\' esecuzione dello script';

    private static SCRIPT_URL: string = Constants.HOSTNAME+':'+Constants.PORT+Constants.FOLDER_JSON+'/popular_events.json';


    constructor(){
        this.flight_events_request();
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

    flight_events_request(): boolean{
        let ok:boolean = false;
        this._errno = 0;
        let fe_list = this.flight_event_request_promise();
        fe_list.then(res => {
            console.log(res);
        }).catch(err => {
            console.warn(err);
            this._errno = FlightEventsList.ERR_SCRIPT_EXCEPTION;
        });
        return ok;
    }

    async flight_event_request_promise(): Promise<string>{
        return await new Promise((resolve,reject) => {
            fetch(FlightEventsList.SCRIPT_URL).then(res => {
                resolve(res.text());
            }).catch(err =>{
                reject(err);
            });
        });
    }
}
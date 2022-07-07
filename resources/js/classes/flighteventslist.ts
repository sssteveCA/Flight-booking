import FlightEvent from "./flightevent";
import {Constants} from "../values/constants";
import HtmlCardInterface from "../interfaces/htmlcard.interface";
import FlightEventInterface from "../interfaces/flightevent.interface";

export default class FlightEventsList{
    _flight_events: Array<FlightEvent> = new Array();
    _html: string;
    _errno: number = 0;
    _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = 'Errore durante l\' esecuzione dello script';

    private static SCRIPT_URL: string = Constants.HOSTNAME+':'+Constants.PORT+'/welcome/flightevents';


    constructor(){
    }

    get flight_events(){return this._flight_events;}
    get html(){return this._html;}
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
        console.log("Prima della promise");
        let fe_list = await this.flight_event_request_promise().then(res => {
            //console.log(res);
            let json = JSON.parse(res);
            this._flight_events = json;
            //console.log(this._flight_events);
            this.htmlSet();
            ok = true;
        }).catch(err => {
            console.warn(err);
            this._errno = FlightEventsList.ERR_SCRIPT_EXCEPTION;
        });
        return ok;
    }

    private async flight_event_request_promise(): Promise<string>{
        return new Promise((resolve,reject) => {
            fetch(FlightEventsList.SCRIPT_URL).then(res => {
                resolve(res.text());
            }).catch(err =>{
                reject(err);
            });
        });
    }

    private htmlSet():void{
        let cards = ``;
        //Add cards elements to result
        this._flight_events.forEach((val,index)=>{
            let fel_elem: HtmlCardInterface= {
                image: Constants.FOLDER_FLIGHTEVENTS+'/'+val['image'],
                name: val['name'],
                location: val['location'],
                country: val['country'],
                price: val['price']
            };
            cards += this.htmlCard(fel_elem);
        });
        this._html = `
<div class="container-fluid">
    <div class="row">
        ${cards}
    </div>
</div>
`;
    }

    private htmlCard(data: HtmlCardInterface):string{
        let htmlCard = `
<div class="card col-12 col-sm-6 col-md-4 col-lg-3">
    <img src="${data.image}" alt="${data.name}" title="${data.name}">
    <div class="card-body">
        <h3>${data.name}</h3>
        <div class="card-text d-flex justify-content-between">
            <div class="fs-6">${data.location}</div>
            <div class="fs-6">${data.country}</div>
        </div>
        <div class="card-text d-flex justify-content-between">
            <div class="fs-5">${data.price}</div>
            <a href="#" class="btn btn-warning">Biglietti</a>
        </div>
    </div>
</div>
`;
        return htmlCard;
    }
}
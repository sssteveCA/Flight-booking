import HtmlCardInterface from "../../interfaces/htmlcard.interface";
import { Constants } from "../../values/constants";
import FlightEvent from "./flightevent";


export default class FlightEventsHtml{
    private _flights_event: Array<FlightEvent> = new Array();
    private _html: string = "";

    constructor(json: object){
        this.htmlSet(json);
    }

    get flights_event(){ return this._flights_event; }
    get html(){ return this._html; }


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

    private htmlSet(json: object):void{
        if(json["done"] == true && json["empty"] == false){
            this._flights_event = json["list"];
            let cards = ``;
            //Add cards elements to result
            this._flights_event.forEach((val,index)=>{
                let fel_elem: HtmlCardInterface= {
                    image: Constants.FOLDER_FLIGHTEVENTS+'/'+val['image'],
                    name: val['name'],
                    location: val['location'],
                    gmLink: val['gmLink'],
                    country: val['country'],
                    date: new Date(val['date']),
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
        }//if(json["done"] == true && json["empty"] == false){
        else{
            if(json["empty"] == true)
                this._html = `<div class="alert alert-secondary" role="alert">${json["message"]}</div>`;
            else
                this._html = `<div class="alert alert-danger" role="alert">${json["message"]}</div>`;
        }//else di if(json["done"] == true && json["empty"] == false){  
    }
}
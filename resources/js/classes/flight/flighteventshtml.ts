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
    <div class="div-image">
        <img src="${data.image}" alt="${data.name}" title="${data.name}">
    </div>
    <div class="card-body">
        <div class="div-title">
            <h5 class="card-title">${data.name}</h3>
        </div>
        <div class="card-text div-date">
            <div class="fs-6">${data.date.getDate()}-${data.date.getMonth()+1}-${data.date.getFullYear()}</div>
        </div>
        <div class="card-text d-flex div-city">
            <div class="fs-6">${data.city}</div>
        </div>
        <div class="card-text d-flex justify-content-between div-price">
            <div class="fs-5">${data.price}€</div>
            <a href="/flightevents/${data.id}" class="btn btn-warning">Biglietti</a>
        </div>
    </div>
</div>
`;
        return htmlCard;
    }

    private htmlSet(json: object):void{
        if(json[Constants.KEY_DONE] == true && json[Constants.KEY_EMPTY] == false){
            this._flights_event = json["list"];
            let cards = ``;
            //Add cards elements to result
            this._flights_event.forEach((val,index)=>{
                let fel_elem: HtmlCardInterface= {
                    id: val['id'],
                    name: val['name'],
                    city: val['city'],
                    date: new Date(val['date']),
                    price: val['price'],
                    image: Constants.FOLDER_FLIGHTEVENTS+'/'+val['image'],
                };
                cards += this.htmlCard(fel_elem);
            });
            this._html = `
<div class="container-fluid">
    <div class="row gx-2 gy-4 single-card">
        ${cards}
    </div>
</div>
`;
        }//if(json["done"] == true && json[Constants.KEY_EMPTY] == false){
        else{
            if(json[Constants.KEY_EMPTY] == true)
                this._html = `<div class="alert alert-secondary" role="alert">${json[Constants.KEY_MESSAGE]}</div>`;
            else
                this._html = `<div class="alert alert-danger" role="alert">${json[Constants.KEY_MESSAGE]}</div>`;
        }//else di if(json["done"] == true && json[Constants.KEY_EMPTY] == false){  
    }
}
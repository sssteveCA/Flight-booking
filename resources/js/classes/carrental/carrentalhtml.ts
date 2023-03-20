import CarRentalHtmlInterface from "../../interfaces/carrental/carrentalhtml.interface";
import { AutoChangeTypes, AutoPowerSupplies } from "../../values/enums";

export default class CarRentalHtml{

    private _day_price: number;
    private _baggages: string;
    private _change: AutoChangeTypes;
    private _div_images: JQuery<HTMLDivElement>;
    private _div_info: JQuery<HTMLDivElement>;
    private _doors: number;
    private _power_supply: AutoPowerSupplies;
    private _seats: number;
    private _images: string[];

    constructor(data: CarRentalHtmlInterface){
        this.setValues(data);
        this.setCarRentalInfoTable();
    }

    get day_price(){ return this._day_price; }
    get baggages(){ return this._baggages; }
    get change(){ return this._change; }
    get doors(){ return this._doors; }
    get power_supply(){ return this._power_supply; }
    get seats(){ return this._seats; }
    get images(){ return this._images; }

    private setValues(data: CarRentalHtmlInterface): void{
        this._day_price = data.day_price;
        this._baggages = data.details.baggages;
        this._change = data.details.change;
        this._doors = data.details.doors;
        this._power_supply = data.details.power_supply;
        this._seats = data.details.seats;
        this._images = data.images;
        this._div_images = $('#'+data.html_elements_id.images);
        this._div_info = $('#'+data.html_elements_id.info);
    }

    private setCarRentalInfoTable(): void{
        let html: string = `
<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row">ALIMENTAZIONE</th>
            <td>${this._power_supply}</td>
        </tr>
        <tr>
            <th scope="row">PORTE</th>
            <td>${this._doors}</td>
        </tr>
        <tr>
            <th scope="row">BAGAGLI</th>
            <td>${this._baggages}</td>
        </tr>
        <tr>
            <th scope="row">CAMBIO</th>
            <td>${this._change}</td>
        </tr>
        <tr>
            <th scope="row">POSTI</th>
            <td>${this._seats}</td>
        </tr>
        <tr>
            <th scope="row">PREZZO 1 GIORNO</th>
            <td>${this._day_price}</td>
        </tr>
    </tbody>
</table>        
        `;
        this._div_info.html(html);
    }
}
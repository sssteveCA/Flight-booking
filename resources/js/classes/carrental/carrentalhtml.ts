import CarRentalHtmlInterface from "../../interfaces/carrental/carrentalhtml.interface";
import { AutoChangeTypes, AutoPowerSupplies } from "../../values/enums";

export default class CarRentalHtml{

    private _day_price: number;
    private _baggages: string;
    private _change: AutoChangeTypes;
    private _doors: number;
    private _power_supply: AutoPowerSupplies;
    private _seats: number;
    private _images: string[];

    constructor(data: CarRentalHtmlInterface){

    }

    get day_price(){ return this._day_price; }
    get baggages(){ return this._baggages; }
    get change(){ return this._change; }
    get doors(){ return this._doors; }
    get power_supply(){ return this._power_supply; }
    get seats(){ return this._seats; }
    get images(){ return this._images; }
}
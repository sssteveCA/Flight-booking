import FlightEventInterface from "../interfaces/flightevent.interface";

export default class FlightEvent{
    _name: string;
    _location: string;
    _price: number;
    _image: string;

    constructor(data: FlightEventInterface){
        this._name = data.name;
        this._location = data.location;
        this._price = data.price;
        this._image = data.image;
    }

    get name(){return this._name;}
    get location(){return this._location;}
    get price(){return this._price;}
    get image(){return this._image;}
}
import FlightEventInterface from "../../interfaces/flight/flightevent.interface";

export default class FlightEvent{
    _id: string;
    _name: string;
    _location: string;
    _gmLink: string;
    _country: string;
    _city: string;
    _price: number;
    _date: Date;
    _image: string;

    constructor(data: FlightEventInterface){
        this._id;
        this._name = data.name;
        this._location = data.location;
        this._gmLink = data.gmLink;
        this._country = data.country;
        this._city = data.city;
        this._price = data.price;
        this._date = data.date;
        this._image = data.image;
    }

    get name(){return this._name;}
    get location(){return this._location;}
    get gmLink(){return this._gmLink;}
    get country(){return this._country;}
    get city(){return this._city;}
    get price(){return this._price;}
    get date(){return this._date;}
    get image(){return this._image;}
}
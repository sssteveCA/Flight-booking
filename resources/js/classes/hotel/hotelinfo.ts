import HotelInfoInterface from "../../interfaces/hotel/hotelinfo.interface";

export default class HotelInfo{
    private _country: string;
    private _city: string;
    private _hotel: string;
    private _errno: number = 0;
    private _error: string|null = null;

    constructor(data: HotelInfoInterface){
        this.assignValues(data);
    }

    get country(){return this._country;}
    get city(){return this._city;}
    get hotel(){return this._hotel;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            default:
                this._error = null;
        }
        return this._error;
    }

    private assignValues(data: HotelInfoInterface): void{
        this._country = data.country;
        this._city = data.city;
        this._hotel = data.hotel;
    }
}
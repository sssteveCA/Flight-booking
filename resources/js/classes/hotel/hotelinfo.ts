import HotelInfoInterface from "../../interfaces/hotel/hotelinfo.interface";

export default class HotelInfo{
    private _country: string;
    private _city: string;
    private _hotel: string;
    private _hotel_info: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static FETCH_URL:string = "/hotelinfo";

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelInfoInterface){
        this.assignValues(data);
    }

    get country(){return this._country;}
    get city(){return this._city;}
    get hotel(){return this._hotel;}
    get hotel_info(){return this._hotel_info;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case HotelInfo.ERR_FETCH:
                this._error = HotelInfo.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    private assignValues(data: HotelInfoInterface): void{
        this._country = data.country;
        this._city = data.city;
        this._hotel = data.hotel;
        this._hotel_info = {};
    }

    private async get_hotel_info_promise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            fetch(`${HotelInfo.FETCH_URL}?country=${this._country}&city=${this._city}&hotel=${this._hotel}`,{
                headers: {'Content-Type': 'application/json'}
            }).then(res => {
                if(res.status == 404){

                }
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
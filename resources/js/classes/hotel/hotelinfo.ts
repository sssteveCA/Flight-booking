import HotelInfoInterface from "../../interfaces/hotel/hotelinfo.interface";
import NotFound404Error from "../errors/notfound404error";

export default class HotelInfo{
    private _country: string;
    private _city: string;
    private _hotel: string;
    private _hotel_info: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static FETCH_URL:string = "/hotelinfo";

    public static ERR_FETCH: number = 1;
    public static ERR_NOT_FOUND_404: number = 2;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";
    private static ERR_NOT_FOUND_404_MSG: string = "Hotel non trovato";

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
            case HotelInfo.ERR_NOT_FOUND_404:
                this._error = HotelInfo.ERR_NOT_FOUND_404_MSG;
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

    public async get_hotel_info(): Promise<object>{
        let response: object = {};
        this._errno = 0;
        try{
            await this.get_hotel_info_promise().then(res => {
                response = {
                    done: true,
                    info: res
                };
                this._hotel_info = response['info'];
            }).catch(err => {
                throw err;
            });
        }catch(e){
            if(e instanceof NotFound404Error)
                this._errno = HotelInfo.ERR_NOT_FOUND_404;
            else
                this._errno = HotelInfo.ERR_FETCH;
            response = {
                done: false,
                msg: this.error
            }; 
        }
        return response;
    }

    private async get_hotel_info_promise(): Promise<object>{
        return await new Promise<object>((resolve,reject)=>{
            fetch(`${HotelInfo.FETCH_URL}?country=${this._country}&city=${this._city}&hotel=${this._hotel}`,{
                headers: {'Content-Type': 'application/json'}
            }).then(res => {
                if(res.status == 404){
                    throw new NotFound404Error("Hotel non trovato");
                }
                resolve(res.json());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
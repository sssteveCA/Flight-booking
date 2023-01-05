import HotelDeleteInterface from "../../interfaces/hotel/hoteldelete.interface";

export default class HotelDelete{

    private _id: number;
    private _token: string;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    private static URL_SCRIPT:string = "";

    constructor(data: HotelDeleteInterface){
        this._id = data.id;
        this._token = data.token;
    }

    get id(){return this._id;}
    get token(){return this._id;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

}
import HotelDeleteInterface from "../../interfaces/hotel/hoteldelete.interface";
import { Constants } from "../../values/constants";

export default class HotelDelete{

    private _id: number;
    private _token: string;
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    private static URL_SCRIPT:string = Constants.URL_HOTELLIST;

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

    public async deleteHotel(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.deleteHotelPromise().then(res => {
                //console.log(res);
                response = JSON.parse(res);
            }).catch(err => {
                throw err;
            });
        }catch(e){
            this._errno = HotelDelete.ERR_FETCH;
            response = {
                done: false, msg: this.error
            }
        }
        return response;
    }

    private async deleteHotelPromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            let url = HotelDelete.URL_SCRIPT+'/'+this._id;
            fetch(url,{
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': this._token
                }
            }).then(res => {
                //console.log(res);
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }

}
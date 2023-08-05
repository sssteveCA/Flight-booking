import CarRentalDeleteInterface from "../../interfaces/carrental/carrentaldelete.interface";
import { Constants } from "../../values/constants";

export default class CarRentalDelete{

    private _id: number;
    private _token: string;

    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    private static FETCH_URL: string = Constants.URL_CARRENTALLIST;

    constructor(data: CarRentalDeleteInterface){
        this._id = data.id;
        this._token = data.token;
    }

    get id(){return this._id;}
    get token(){return this._id;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case CarRentalDelete.ERR_FETCH:
                this._error = CarRentalDelete.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async deleteCar(): Promise<object>{
        this._errno = 0;
        let response: object = {}
        try{
            await this.deleteCarPromise().then(res => {
                response = JSON.parse(res);
            }).catch(err => {
                throw err;
            })
        }catch(e){
            this._errno = CarRentalDelete.ERR_FETCH;
            response = {
                done: false, message: this.error
            }
        }
        return response;
    }

    private async deleteCarPromise(): Promise<string>{
        return await new Promise<string>((resolve, reject) => {
            let url = CarRentalDelete.FETCH_URL+'/'+this._id;
            fetch(url,{
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': this._token
                }
            }).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            })
        })
    }
   
}
import FlightDeleteInterface from "../../interfaces/flight/flightdelete.interface";
import { Constants } from "../../values/constants";

export default class FlightDelete{
    private _id: number;
    private _token: string;
    private _msg: string;
    private _deleted: boolean = false; //Check if flight was deleted 
    private _errno: number = 0;
    private _error: string|null = null;

    public static ERR_FETCH:number = 1;
    public static ERR_NOTFOUND:number = 2;
    public static ERR_UNAUTHORIZED:number = 3;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    //Delete flight endpoint
    private static URL_SCRIPT:string = Constants.URL_FLIGHTSLIST;

    constructor(data: FlightDeleteInterface){
        this._id = data.id;
        this._token = data.token;
    }

    get id(){return this._id;}
    get token(){return this._token;}
    get msg(){return this._msg;}
    get deleted(){return this._deleted;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case FlightDelete.ERR_FETCH:
                this._error = FlightDelete.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async deleteFlight(): Promise<object>{
        let msg = '';
        let deleted = false;
        this._errno = 0;
        await this.deleteFlightPromise().then(res => {
            //console.log(res);
            let json = JSON.parse(res);
            //console.log(json);
            msg = json[Constants.KEY_MESSAGE];
            deleted = json['deleted'];
        }).catch(err => {
            console.warn(err);
            this._errno = FlightDelete.ERR_FETCH;
            msg = this.error as string;
        });
        this._deleted = deleted;
        this._msg = msg;
        let obj = {};
        obj[Constants.KEY_MESSAGE] = this._msg;
        obj['deleted'] = this._deleted;
        return obj;
    }

    private async deleteFlightPromise(): Promise<string>{
        let promise = await new Promise((resolve,reject) => {
            let url = FlightDelete.URL_SCRIPT+'/'+this._id;
            //console.log("url => "+url);
            fetch(url,{
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': this._token
                },
            }).then(res => {
                //console.log(res);
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
        return promise as string;
    }
}
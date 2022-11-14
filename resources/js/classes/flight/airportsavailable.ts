import { Constants } from "../../values/constants";

export default class AirportsAvailable{

    private _airports: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT: string = Constants.URL_AIRPORTSAVAILABLE;

    public static ERR_FETCH:number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(){

    }

    get airports(){ return this._airports; }
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case AirportsAvailable.ERR_FETCH:
                this._error = AirportsAvailable.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async airportsAvailable(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.airportsAvailablePromise().then(res => {
                response = JSON.parse(res);
                this._airports = response;
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
            this._errno = AirportsAvailable.ERR_FETCH;
        }
        return response;
    }

    private async airportsAvailablePromise(): Promise<string>{
        return await new Promise<string>((resolve,reject) => {
            fetch(AirportsAvailable.URL_SCRIPT).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
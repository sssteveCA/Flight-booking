import DeleteAccountInterface from "../../interfaces/profile/deleteaccout.interface";

export default class DeleteAccount{

    private _token: string;
    private _password: string;
    private _password_conf: string;
    private _errno: number = 0;
    private _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";

    constructor(data: DeleteAccountInterface){

    }

    get token(){return this._token;}
    get password(){return this._password;}
    get password_conf(){return this._password_conf;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case DeleteAccount.ERR_SCRIPT_EXCEPTION:
                this._error = DeleteAccount.ERR_SCRIPT_EXCEPTION_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }
}
import EditPasswordInterface from "../../interfaces/profile/editpassword.interface";
import { Constants } from "../../values/constants";

export default class EditPassword{

    private _oldpwd: string;
    private _newpwd: string;
    private _confnewpwd: string;
    private _token: string;
    private _errno: number = 0;
    private _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";

    constructor(data: EditPasswordInterface){
        this._oldpwd = data.oldpwd;
        this._newpwd = data.newpwd;
        this._confnewpwd = data.confnewpwd;
        this._token = data.token;
    }

    get oldpwd(){return this._oldpwd;}
    get newpwd(){return this._newpwd;}
    get confnewpwd(){return this._confnewpwd;}
    get token(){return this._token;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case EditPassword.ERR_SCRIPT_EXCEPTION:
                this._error = EditPassword.ERR_SCRIPT_EXCEPTION_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }
}
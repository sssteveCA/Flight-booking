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
    private static ERR_PASSWORDS_DIFFERENT:number = 2;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";
    private static ERR_PASSWORDS_DIFFERENT_MSG:string = "Le due password inserite non coincidono";

    private static URL_SCRIPT:string = Constants.URL_EDITPASSWORD;

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
            case EditPassword.ERR_PASSWORDS_DIFFERENT:
                this._error = EditPassword.ERR_PASSWORDS_DIFFERENT_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async editPassword(): Promise<string>{
        let message: string = '';
        this._errno = 0;
        if(this._newpwd == this._confnewpwd){
            //Confirm password is equal to new password
            try{
                await this.editPasswordPromise().then(res => {
                    //console.log(res);
                    let json = JSON.parse(res);
                    message = json[Constants.KEY_MESSAGE]; 
                }).catch(err => {
                    this._errno = EditPassword.ERR_SCRIPT_EXCEPTION;
                    console.warn(err);
                    throw err;
                });
            }catch(err){
                message = EditPassword.ERR_SCRIPT_EXCEPTION_MSG;
            }
        }//if(this._newpwd != this._confnewpwd){
        else{
            this._errno = EditPassword.ERR_PASSWORDS_DIFFERENT;
            message = EditPassword.ERR_PASSWORDS_DIFFERENT_MSG;
        }
        return message;
    }

    private async editPasswordPromise(): Promise<string>{
        let values = {
            oldpwd: this._oldpwd,
            newpwd: this._newpwd,
            confnewpwd: this._confnewpwd
        };
        let promise = await new Promise((resolve,reject)=>{
            fetch(EditPassword.URL_SCRIPT,{
                method: 'PATCH',
                body: JSON.stringify(values),
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN': this._token
                }
            }).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
        return promise as string;
    }
}
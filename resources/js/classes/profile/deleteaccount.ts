import DeleteAccountInterface from "../../interfaces/profile/deleteaccout.interface";
import { Constants } from "../../values/constants";

export default class DeleteAccount{

    private _token: string;
    private _password: string;
    private _password_conf: string;
    private _errno: number = 0;
    private _error: string|null = null;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;
    private static ERR_PASSWORDS_DIFFERENT:number = 2;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";
    private static ERR_PASSWORDS_DIFFERENT_MSG:string = "Le due password inserite non coincidono";

    private static SCRIPT_URL:string = Constants.URL_DELETEACCOUNT;

    constructor(data: DeleteAccountInterface){
        this._token = data.token;
        this._password = data.password;
        this._password_conf = data.password_conf;
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
            case DeleteAccount.ERR_PASSWORDS_DIFFERENT:
                this._error = DeleteAccount.ERR_PASSWORDS_DIFFERENT_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async deleteAccount(): Promise<object>{
        let response:object = {};
        this._errno = 0;
        if(this._password == this._password_conf){
            try{
                await this.deleteAccountPromise().then(res => {
                    console.log(res);
                    let json = JSON.parse(res);
                    response = {
                        status: json[Constants.KEY_STATUS],
                        message: json[Constants.KEY_MESSAGE]
                    };
                }).catch(err => {
                    this._errno = DeleteAccount.ERR_SCRIPT_EXCEPTION;
                })
            }catch(err){
                response = {
                    status: 'ERROR',
                    message: DeleteAccount.ERR_SCRIPT_EXCEPTION_MSG
                };
            }
        }//if(this._password == this._password_conf){
        else{
            this._errno = DeleteAccount.ERR_PASSWORDS_DIFFERENT;
            response = {
                status: 'ERROR',
                message: DeleteAccount.ERR_PASSWORDS_DIFFERENT_MSG
            };
        }
        return response;
    }

    private async deleteAccountPromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            let values = {
                password: this._password,
                password_conf: this._password_conf
            };
            fetch(DeleteAccount.SCRIPT_URL,{
                method: 'POST',
                body: JSON.stringify(values),
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN': this._token
                }
            }).then(res => {
                console.log(res.body);
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }
}
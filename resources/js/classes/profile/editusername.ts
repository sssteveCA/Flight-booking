import EditUsernameInterface from "../../interfaces/profile/editusername.interface";
import { Constants } from "../../values/constants";

export default class EditUsername{
    private _username:string;
    private _token: string;
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT:string = Constants.URL_EDITUSERNAME;

    //Numbers
    private static ERR_SCRIPT_EXCEPTION:number = 1;

    //Messages
    private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";

    constructor(data: EditUsernameInterface){
        this._username = data.username;
        this._token = data.token;
    }

    get username(){return this._username;}
    get token(){return this._token;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case EditUsername.ERR_SCRIPT_EXCEPTION:
                this._error = EditUsername.ERR_SCRIPT_EXCEPTION_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async editUsername(): Promise<string>{
        let message = '';
        this._errno = 0;
        try{
            await this.editUsernamePromise().then(res => {
                //console.log(res);
                let json = JSON.parse(res);
                message = json[Constants.KEY_MESSAGE]; 
            }).catch(err => {
                this._errno = EditUsername.ERR_SCRIPT_EXCEPTION;
                console.warn(err);
                throw err;
            });
        }catch(err){
            message = err as string;
        }
        return message;
    }

    private async editUsernamePromise(): Promise<string>{
        let values = {
            username: this._username
        };
        let promise = await new Promise((resolve,reject)=>{
            fetch(EditUsername.URL_SCRIPT,{
                method: 'PATCH',
                body: JSON.stringify(values),
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8',
                    'X-CSRF-TOKEN': this._token
                }
            }).then(res =>{
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
        return promise as string;
    }
}
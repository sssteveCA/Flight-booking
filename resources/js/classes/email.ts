import EmailInterface from "../interfaces/email.interface";
import { Constants } from "../values/constants";

export default class Email{
    _name: string;
    _email: string;
    _subject: string;
    _message: string;
    _errno: number = 0;
    _error: string|null = null;

    private static URL_SCRIPT = Constants.URL_SENDEMAIL;

    constructor(data: EmailInterface){
        this._name = data.name;
        this._email = data.email;
        this._subject = data.subject;
        this._message = data.message;
    }

    get name(){return this._name;}
    get email(){return this._email;}
    get subject(){return this._subject;}
    get message(){return this._message;}
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
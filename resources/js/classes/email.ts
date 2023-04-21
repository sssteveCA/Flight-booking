import EmailInterface from "../interfaces/email.interface";
import { Constants } from "../values/constants";

export default class Email{
    _name: string;
    _email: string;
    _subject: string;
    _message: string;
    _method: string;
    _token: string;
    _errno: number = 0;
    _error: string|null = null;

    private static URL_SCRIPT = Constants.URL_SENDEMAIL;

     //Numbers
     private static ERR_SCRIPT_EXCEPTION:number = 1;
     private static ERR_NAME_INVALID: number = 2;
     private static ERR_EMAIL_INVALID: number = 3;
     private static ERR_SUBJECT_INVALID: number = 4;
     private static ERR_MESSAGE_INVALID: number = 5;

     //Messages
     private static ERR_SCRIPT_EXCEPTION_MSG:string = "Errore durante l'esecuzione dello script";
     private static ERR_NAME_INVALID_MSG: string = 'Il nome inserito ha un formato non valido';
     private static ERR_EMAIL_INVALID_MSG: string = "L'email inserita ha un formato non valido";
     private static ERR_SUBJECT_INVALID_MSG: string = "L'oggetto inserito ha un formato non valido";
     private static ERR_MESSAGE_INVALID_MSG: string = 'Il messaggio inserito ha un formato non valido';

     //Regexp
     private static regexs: object = {
        'name': '[A-Z][a-zA-Z]{2,}\\S',
        'email': '([a-z0-9A-Z_\.])@([a-zA-Z\.])*([a-zA-Z]){2,6}',
        'subject': '[a-zA-Z0-9?!\.]{5,}',
        'message': '.{5,}\\S'
     };

    constructor(data: EmailInterface){
        this._name = data.name;
        this._email = data.email;
        this._subject = data.subject;
        this._message = data.message;
        this._token = data.token;
    }

    get name(){return this._name;}
    get email(){return this._email;}
    get subject(){return this._subject;}
    get message(){return this._message;}
    get method(){return this._method;}
    get token(){return this._token;}
    get errno(){return this._errno;}
    get error(){
        switch(this._errno){
            case Email.ERR_SCRIPT_EXCEPTION:
                this._error = Email.ERR_SCRIPT_EXCEPTION_MSG;
                break;
            case Email.ERR_NAME_INVALID:
                this._error = Email.ERR_NAME_INVALID_MSG;
                break;
            case Email.ERR_EMAIL_INVALID:
                this._error = Email.ERR_EMAIL_INVALID_MSG;
                break;
            case Email.ERR_SUBJECT_INVALID:
                this._error = Email.ERR_SUBJECT_INVALID_MSG;
                break;
            case Email.ERR_MESSAGE_INVALID:
                this._error = Email.ERR_MESSAGE_INVALID_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    public async sendEmail(): Promise<string>{
        let message = '';
        this._errno = 0;
        try{
            if(!this.validateInput())
                throw this.error; //One input value has wrong format
            await this.sendEmailPromise().then(res => {
                let json = JSON.parse(res);
                message = json[Constants.KEY_MESSAGE];
            }).catch(err =>{
                this._errno = Email.ERR_SCRIPT_EXCEPTION;
                message = this.error as string;
            });
        }catch(err){
            message = err as string;
        }
        return message; 
    }

    private async sendEmailPromise(): Promise<string>{
        var values = {
            name: this._name,
            email: this._email,
            subject: this._subject,
            message: this._message,
        };
        let promise = await new Promise((resolve,reject)=>{
            fetch(Email.URL_SCRIPT,{
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this._token
                },
                body: JSON.stringify(values)                
            }).then(res => {
                resolve(res.text());
            }).catch(err => {
                console.warn(err);
                reject(err);
            })
        });
        return promise as string;
    }

    private validateInput(): boolean{
        let valid = true;
        this._errno = 0;
        let inputs = {
            name: this._name,
            email: this._email,
            subject: this._subject,
            message: this._message
        };
        for(let key in Email.regexs){
            let exp = new RegExp(Email.regexs[key]);
            if(!exp.test(inputs[key])){
                //Match failed
                switch(key){
                    case 'name':
                        this._errno = Email.ERR_NAME_INVALID;
                        break;
                    case 'email':
                        this._errno = Email.ERR_EMAIL_INVALID;
                        break;
                    case 'subject':
                        this._errno = Email.ERR_SUBJECT_INVALID;
                        break;
                    case 'message':
                        this._errno = Email.ERR_MESSAGE_INVALID;
                        break;
                }
                return false;
            }
        }//for(let key in Email.regexs){
        return valid;
    }

}
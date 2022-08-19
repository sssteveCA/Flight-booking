import { Config } from "../../../config";

export namespace Constants{

    export const FOLDER_IMG = '/img';
    export const FOLDER_FLIGHTEVENTS = FOLDER_IMG+'/flightevents';
    
    export const FOLDER_JSON = '/json';
    export const FOLDER_SCRIPT = '/scripts';
    export const HOSTNAME = 'http://127.0.0.1';
    //export const HOSTNAME = 'http://192.168.0.24';
    export const PORT = 8000;

    //Keys
    export const KEY_MESSAGE = 'message';
    export const KEY_STATUS = 'status';

    //Messages
    export const MSG_CONFIRMDELETEACCOUNT = 'Sei sicuro di voler cancellare definitivamente il tuo account?'
    export const MSG_CONFIRMDELETEFLIGHT = 'Sei sicuro di voler rimuovere questo volo definitivamente?';
    export const MSG_CONFIRMEDITPASSWORD = 'Sei sicuro di voler modificare la password?';
    export const MSG_CONFIRMEDITUSERNAME = 'Sei sicuro di voler modificare il nome utente?';
    export const MSG_CONFIRMLOGOUT = 'Sei sicuro di voler chiudere la sessione?';

    //Urls
    export const URL_HOME = Config.HOME_URL;
    export const URL_AIRPORTSSEARCH = URL_HOME+'/airportsearch';
    export const URL_COMPANIESSEARCH = URL_HOME+'/companieslist';
    export const URL_DELETEACCOUNT = URL_HOME+'/profile/deleteAccount';
    export const URL_EDITPASSWORD = URL_HOME+'/profile/editPassword';
    export const URL_EDITUSERNAME = URL_HOME+'/profile/editUsername';
    export const URL_FLIGHTSLIST = URL_HOME+'/profile/myFlights';
    export const URL_FLIGHTEVENTS = URL_HOME+'/flightevents';
    export const URL_FLIGHTSEARCH = URL_HOME+'/flightsearch'
    export const URL_SENDEMAIL = URL_HOME+'/contacts/sendemail';
}
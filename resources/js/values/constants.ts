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
    export const KEY_DONE = 'done';
    export const KEY_EMPTY = 'empty';
    export const KEY_MESSAGE = 'message';
    export const KEY_STATUS = 'status';

    //Messages
    export const MSG_CONFIRMDELETEACCOUNT = 'Sei sicuro di voler cancellare definitivamente il tuo account?'
    export const MSG_CONFIRMDELETEFLIGHT = 'Sei sicuro di voler rimuovere questo volo definitivamente?';
    export const MSG_CONFIRMDELETEHOTEL = 'Sei sicuro di voler rimuovere questa prenotazione definitivamente?';
    export const MSG_CONFIRMEDITPASSWORD = 'Sei sicuro di voler modificare la password?';
    export const MSG_CONFIRMEDITUSERNAME = 'Sei sicuro di voler modificare il nome utente?';
    export const MSG_CONFIRMLOGOUT = 'Sei sicuro di voler chiudere la sessione?';

    //Static Urls
    const STATIC_URL_IMG = '/img';
    export const STATIC_URL_IMG_CARRENTAL = STATIC_URL_IMG+'/carrental';
    export const STATIC_URL_IMG_HOTELS = STATIC_URL_IMG+'/hotels';

    //Urls
    export const URL_HOME = Config.HOME_URL;
    export const URL_AIRPORTS_AVAILABLE = '/airports';
    export const URL_AIRPORTSSEARCH = '/airportsearch';
    export const URL_CARRENTALLIST = '/profile/myCars';
    export const URL_CARRENTALSEARCH = '/carrentalsearch';
    export const URL_COMPANIESSEARCH = '/companieslist';
    export const URL_DELETEACCOUNT = '/profile/deleteAccount';
    export const URL_EDITPASSWORD = '/profile/editPassword';
    export const URL_EDITUSERNAME = '/profile/editUsername';
    export const URL_FLIGHTSLIST = '/profile/myFlights';
    export const URL_FLIGHTEVENTS = '/flightevents';
    export const URL_FLIGHTSEARCH = '/flightsearch'
    export const URL_HOTELLIST = '/profile/myHotels';
    export const URL_HOTELS_AVAILABLE = '/hotels';
    export const URL_PREFERENCES_SET = '/preferences_set';
    export const URL_SENDEMAIL = '/contacts/sendemail';
}
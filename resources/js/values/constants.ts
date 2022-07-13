export namespace Constants{

    export const FOLDER_IMG = '/img';
    export const FOLDER_FLIGHTEVENTS = FOLDER_IMG+'/flightevents';
    
    export const FOLDER_JSON = '/json';
    export const FOLDER_SCRIPT = '/scripts';
    export const HOSTNAME = 'http://127.0.0.1';
    //export const HOSTNAME = 'http://192.168.0.24';
    export const PORT = 8000;

    export const URL_HOME = HOSTNAME+':'+PORT;
    export const URL_AIRPORTSSEARCH = URL_HOME+'/airportsearch';
    export const URL_COMPANIESSEARCH = URL_HOME+'/companieslist';
    export const URL_FLIGHTEVENTS = URL_HOME+'/flightevents';
    export const URL_FLIGHTSEARCH = URL_HOME+'/flightsearch'
}
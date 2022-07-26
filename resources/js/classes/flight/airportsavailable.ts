import AirportsAvailableInterface from "../../interfaces/flight/airportsavailable.interface";
import { Constants } from "../../values/constants";

export default class AirportsAvailable{

    private _country_departure_el: JQuery<HTMLSelectElement>;
    private _country_arrival_el: JQuery<HTMLSelectElement>;
    private _airport_departure_el: JQuery<HTMLSelectElement>;
    private _airport_arrival_el: JQuery<HTMLSelectElement>;
    private _airports: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT: string = Constants.URL_AIRPORTS_AVAILABLE;

    public static ERR_FETCH:number = 1;

    private static ERR_FETCH_MSG:string = "Errore durante l'esecuzione della richiesta";

    constructor(data: AirportsAvailableInterface){
        this.assignValues(data);
    }

    get airports(){ return this._airports; }
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case AirportsAvailable.ERR_FETCH:
                this._error = AirportsAvailable.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    private assignValues(data: AirportsAvailableInterface): void{
        this._country_departure_el = $('#'+data.country_departure_id);
        this._country_arrival_el = $('#'+data.country_arrival_id);
        this._airport_departure_el = $('#'+data.airport_departure_id);
        this._airport_arrival_el = $('#'+data.airport_arrival_id);
    }

    /**
     * Get the entire airports details object from the server
     * @returns Promise<object> 
     */
    public async airportsAvailable(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.airportsAvailablePromise().then(res => {
                response = JSON.parse(res);
                this._airports = response;
                this.fillDropdowns();
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
            this._errno = AirportsAvailable.ERR_FETCH;
        }
        return response;
    }

    private async airportsAvailablePromise(): Promise<string>{
        return await new Promise<string>((resolve,reject) => {
            fetch(AirportsAvailable.URL_SCRIPT).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }

    /**
     * Add the option items to the airports dropdown after one of the dropdown with countries list has changed
     * @param dropdown 
	 * @param airports
     */
     private fillAirportDropdowns(dropdown: JQuery<HTMLSelectElement>, airports: string[]): void{
        dropdown.html('');
        airports.forEach(airport => {
            let option = $('<option>');
            option.text(airport);
            option.val(airport);
            dropdown.append(option);
        });
    }

    /**
     * Add the option item to countries and airports list list dropdowns 
     */
    private fillDropdowns(): void{
        let countries: string[] = this.getCountries();
        countries.forEach(country => {
            let option = $('<option>');
            option.text(country);
            option.val(country);
            this._country_departure_el.append(option);
        });
        countries.forEach(country => {
            let option = $('<option>');
            option.text(country);
            option.val(country);
            this._country_arrival_el.append(option);
        })
        this.setEvents();
        this._country_departure_el.trigger('change');
        this._country_arrival_el.trigger('change');
    }

    /**
     * Get the countries that have bookable airports
     * @returns string[]
     */
    private getCountries(): string[]{
        return Object.keys(this._airports);
    }

    /**
     * Get the airports available in a specific country
     * @param country 
     * @returns string[]
     */
    private getCountryAirports(country: string): string[]{
        let airports: string[] = [];
        if(this._airports.hasOwnProperty(country)){
            airports = Object.keys(this._airports[country]);
        }
        return airports;
    }

    /**
     * Add change listeners to countries list dropdowns
     */
    private setEvents(): void{
        this._country_departure_el.on('change',()=>{
            let country: string = this._country_departure_el.val() as string;
            let airports: string[] = this.getCountryAirports(country);
            this.fillAirportDropdowns(this._airport_departure_el,airports);
        });
        this._country_arrival_el.on('change',()=>{
            let country: string = this._country_arrival_el.val() as string;
            let airports: string[] = this.getCountryAirports(country);
            this.fillAirportDropdowns(this._airport_arrival_el,airports);
        });
    }
}
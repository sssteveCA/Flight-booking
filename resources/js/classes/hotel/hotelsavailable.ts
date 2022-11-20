import HotelsAvailableInterface from "../../interfaces/hotel/hotelsavailable.interface";
import { Constants } from "../../values/constants";

export default class HotelsAvailable{
    private _hotel_countries_el: JQuery<HTMLSelectElement>;
    private _hotel_cities_el: JQuery<HTMLSelectElement>;
    private _hotels_list_el: JQuery<HTMLSelectElement>;
    private _hotel_info_el: JQuery<HTMLDivElement>;
    private _hotel_info_image_el: JQuery<HTMLDivElement>;
    private _hotels: object;
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT: string = Constants.URL_HOTELS_AVAILABLE;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";

    constructor(data: HotelsAvailableInterface){
        this.assignValues(data);
    }

    get hotels(){ return this._hotels; }
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case HotelsAvailable.ERR_FETCH:
                this._error = HotelsAvailable.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    private assignValues(data: HotelsAvailableInterface): void{
        this._hotel_countries_el = $('#'+data.hotel_countries_id);
        this._hotel_cities_el = $('#'+data.hotel_cities_id);
        this._hotels_list_el = $('#'+data.hotels_list_id);
        this._hotel_info_el = $('#'+data.hotel_info_id);
        this._hotel_info_image_el = $('#'+data.hotel_info_images_id);
    }

    /**
     * Get the entire hotels details object from the server
     * @returns Promise<object>
     */
    public async hotelsAvailable(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.hotelsAvailablePromise().then(res => {
                response = JSON.parse(res);
                this._hotels = response;
                this.fillDropdown();
            }).catch(err => {
                throw err;
            });
        }catch(e){
            console.warn(e);
            this._errno = HotelsAvailable.ERR_FETCH;
        }
        return response;
    }

    private async hotelsAvailablePromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            fetch(HotelsAvailable.URL_SCRIPT).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            });
        });
    }

    /**
     * Add the option item to countries dropdown 
     */
    private fillDropdown(): void{
        let countries: string[] = this.getCountries();
        countries.forEach(country => {
            let option = $('<option>');
            option.text(country);
            option.val(country);
            this._hotel_countries_el.append(option);
        }); 
        this.setEvents();
        this._hotel_countries_el.trigger('change');
    }

    /**
     * Add the option items to the dropdown after one of the dropdown parents has changed the value
     * @param dropdown 
     * @param list
     */
    private fillHotelDropdowns(dropdown: JQuery<HTMLSelectElement>, list: string[]): void{
        dropdown.html('');
        list.forEach(element => {
            let option = $('<option>');
            option.text(element);
            option.val(element);
            dropdown.append(option);
        });
    }

    /**
     * Get the countries that have bookable hotels
     * @returns string[]
     */
    private getCountries(): string[]{
        return Object.keys(this._hotels);
    }

    /**
     * Get the cities that have hotels list of a particular country
     * @param country 
     * @returns string[]
     */
    private getCountryCities(country: string): string[]{
        let cities: string[] = [];
        if(this._hotels.hasOwnProperty(country)){
            cities = Object.keys(this._hotels[country]);
        }
        return cities;
    }

    /**
     * Get single hotel information
     * @param country the country of the hotel
     * @param city the city of the hotel
     * @param hotel the hotel name
     * @returns an object that contains the hotel information
     */
    private getHotelDetails(country: string, city: string, hotel:string): object{
        let details: object = {};
        if(this._hotels.hasOwnProperty(country)){
            if(this._hotels[country].hasOwnProperty(city)){
                if(this._hotels[country][city].hasOwnProperty(hotel))
                    return this._hotels[country][city][hotel];
            }
        }
        return details;
    }

    /**
     * Get the hotel located in a particular city of a country
     * @param country 
     * @param city 
     * @returns string[]
     */
    private getHotelsList(country: string, city: string): string[]{
        let hotels: string[] = [];
        if(this._hotels.hasOwnProperty(country)){
            if(this._hotels[country].hasOwnProperty(city)){
                hotels = Object.keys(this._hotels[country][city]);
            }
        }
        return hotels;
    }

    /**
     * Add change listeners to countries and cities list dropdowns
     */
    private setEvents(): void{
        this._hotel_countries_el.on('change',()=>{
            let country: string = this._hotel_countries_el.val() as string;
            let cities: string[] = this.getCountryCities(country);
            this.fillHotelDropdowns(this._hotel_cities_el,cities);
            this._hotel_cities_el.trigger('change');
        });
        this._hotel_cities_el.on('change',()=>{
            let country: string = this._hotel_countries_el.val() as string;
            let city: string = this._hotel_cities_el.val() as string;
            let hotels: string[] = this.getHotelsList(country,city);
            this.fillHotelDropdowns(this._hotels_list_el,hotels);
            this._hotels_list_el.trigger('change');
        });
        this._hotels_list_el.on('change',()=>{
            let country: string = this._hotel_countries_el.val() as string;
            let city: string = this._hotel_cities_el.val() as string;
            let hotel: string = this._hotels_list_el.val() as string;
            let hotel_info: object = this.getHotelDetails(country,city,hotel);
            this.setHotelInfoTable(hotel_info);
        });
    }

    /**
     * Set the table that contains the single hotel information
     * @param info 
     */
    private setHotelInfoTable(info: object): void{
        this._hotel_info_el.html('');
        if(Object.entries(info).length > 0){
            let html: string = `
<table class="table table-striped">
    <tbody>        
        `;
            if('max_people' in info){
                html += `
<tr>
    <th scope="row">Numero massimo di persone per stanza</th>
    <td>${info['max_people']}</td>
</tr>            
`;
            }//if('max_people' in info){
            if('price' in info){
                html += `
<tr>
    <th scope="row">Prezzo per notte</th>
    <td>${info['price']}€</td>
</tr>           
`;
            }//if('price' in info){
            if('rooms' in info){
                html += `
<tr>
    <th scope="row">Stanze disponibili</th>
    <td>${info['rooms']} stanze</td>
</tr>            
`;
            }//if('rooms' in info){
            if('score' in info){
                html += `
<tr>
    <th scope="row">Voto medio</th>
    <td>${info['score']}</td>
</tr>            
`;
            }//if('score' in info){
            if('stars' in info){
                html += `
<tr>
    <th scope="row">Stelle</th>
    <td>${info['stars']} stelle</td>
</tr>                
`;
            }//if('stars' in info){
            html += `
    </tbody>
</table>    
`;
            this._hotel_info_el.html(html);
        }//if(Object.entries(info).length > 0){ 
    }
}
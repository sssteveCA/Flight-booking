import CarRentalInterface from "../../interfaces/carrental/carrental.interface";
import { Constants } from "../../values/constants";

export default class CarRental{

    private _carrental_company_el: JQuery<HTMLSelectElement>;
    private _car_model_el: JQuery<HTMLSelectElement>;
    private _pickup_location_el: JQuery<HTMLSelectElement>;
    private _delivery_location_el: JQuery<HTMLSelectElement>;
    private _rent_start_el: JQuery<HTMLInputElement>;
    private _rent_end_el: JQuery<HTMLInputElement>;
    private _age_range_el: JQuery<HTMLSelectElement>;
    private _carrental_data: object = {};
    private _errno: number = 0;
    private _error: string|null = null;

    private static URL_SCRIPT:string = Constants.URL_CARRENTALSEARCH;

    public static ERR_FETCH: number = 1;

    private static ERR_FETCH_MSG: string = "Errore durante l'esecuzione della richiesta";


    constructor(data: CarRentalInterface){
        this.assignValues(data);
    }

    get carrental_data(){return this._carrental_data;}
    get errno(){ return this._errno; }
    get error(){
        switch(this._errno){
            case CarRental.ERR_FETCH:
                this._error = CarRental.ERR_FETCH_MSG;
                break;
            default:
                this._error = null;
                break;
        }
        return this._error;
    }

    private assignValues(data: CarRentalInterface): void{
        this._carrental_company_el = $('#'+data.carrental_company_id);
        this._car_model_el = $('#'+data.car_model_id);
        this._pickup_location_el = $('#'+data.pickup_location_id);
        this._delivery_location_el = $('#'+data.delivery_location_id);
        this._rent_start_el = $('#'+data.rent_start_id);
        this._rent_end_el = $('#'+data.rent_end_id);
        this._age_range_el = $('#'+data.age_range_id);
    }

    public async carRental(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.carRentalPromise().then(res => {
                //console.log(res);
                response = JSON.parse(res);
                this._carrental_data = response;
                console.log(this._carrental_data);
                this.fillDropdowns();
            }).catch(err => {
                throw err;
            });
        }catch(e){
            this._errno = CarRental.ERR_FETCH;
        }
        return response;
    }

    private async carRentalPromise(): Promise<string>{
        return await new Promise<string>((resolve,reject)=>{
            fetch(CarRental.URL_SCRIPT).then(res => {
                resolve(res.text());
            }).catch(err => {
                reject(err);
            })
        });
    }

    private fillDropdowns(): void{
        this.setAgeBandsDropdown(this.carrental_data['age_ranges']);
        this.setCountryDropdowns(this._carrental_data['available_locations']);
    }

    private setAgeBandsDropdown(age_bands: [[number,number]]): void{
        age_bands.forEach((age_band, index) => {
            let option: JQuery<HTMLOptionElement> = $('<option>');
            option.val(`${age_band[0]}-${age_band[1]}`);
            if(index == 3)
                option.prop("selected",true);
            option.text(`${age_band[0]}-${age_band[1]} anni`);
            this._age_range_el.append(option);
        })
    }

    private setCountryDropdowns(available_locations: object): void{
        let locations_lists: string[] = Object.keys(available_locations);
        console.log(locations_lists);
        locations_lists.forEach((location, index) => {
            let option_pickup: JQuery<HTMLOptionElement> = $('<option>');
            option_pickup.val(location);
            option_pickup.text(location);
            let option_delivery: JQuery<HTMLOptionElement> = $('<option>');
            option_delivery.val(location);
            option_delivery.text(location);
            if(index == 0){
                option_pickup.prop("selected",true);
                option_delivery.prop("selected",true);
            }
            this._pickup_location_el.append(option_pickup);
            this._delivery_location_el.append(option_delivery);
        });
    }
}
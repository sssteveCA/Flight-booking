import CarRentalInterface from "../../interfaces/carrental/carrental.interface";
import CarRentalHtmlInterface from "../../interfaces/carrental/carrentalhtml.interface";
import { Constants } from "../../values/constants";
import CarRentalHtml from "./carrentalhtml";

export default class CarRental{

    private _carrental_company_el: JQuery<HTMLSelectElement>;
    private _car_model_el: JQuery<HTMLSelectElement>;
    private _pickup_country_el: JQuery<HTMLSelectElement>;
    private _pickup_location_el: JQuery<HTMLSelectElement>;
    private _delivery_country_el: JQuery<HTMLSelectElement>;
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
        this._pickup_country_el = $('#'+data.pickup_country_id);
        this._pickup_location_el = $('#'+data.pickup_location_id);
        this._delivery_country_el = $('#'+data.delivery_country_id);
        this._delivery_location_el = $('#'+data.delivery_location_id);
        this._rent_start_el = $('#'+data.rent_start_id);
        this._rent_end_el = $('#'+data.rent_end_id);
        this._age_range_el = $('#'+data.age_range_id);
    }

    private autoDetails(car_data: object): void{
        let ch_data: CarRentalHtmlInterface = {
            car_name: car_data['car_name'],
            company_name: car_data['company_name'],
            day_price: car_data['day_price'] as number,
            details: { baggages: car_data['details']['baggages'], change: car_data['details']['change'], doors: car_data['details']['doors'], power_supply: car_data['details']['power_supply'], seats: car_data['details']['seats'],
            },
            html_elements_id: { images: 'car_rental_images', info: 'car_rental_info' },
            images: car_data ['images']
        };
        let ch: CarRentalHtml = new CarRentalHtml(ch_data);
    }

    public async carRental(): Promise<object>{
        this._errno = 0;
        let response: object = {};
        try{
            await this.carRentalPromise().then(res => {
                response = JSON.parse(res);
                this._carrental_data = response;
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
        this.setCompanyDropdown(this._carrental_data['companies_data']);
        this.setCountryDropdowns(this._carrental_data['available_locations']);
        this.setAgeBandsDropdown(this._carrental_data['age_ranges']);
        this.setDropDownEvents();
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

    private setCompanyCarsDropdown(company_cars_data: object): void{
        this._car_model_el.empty();
        let company_cars: string[] = Object.keys(company_cars_data);
        company_cars.forEach((car,index) => {
            let option: JQuery<HTMLOptionElement> = $('<option>');
            option.val(car);
            option.text(car);
            if(index == 0)
                option.prop("selected",true);
            this._car_model_el.append(option);  
        });
        let selected_company: string = this._carrental_company_el.find('option').filter(':selected').text();
        let selected_car: string = this._car_model_el.find('option').filter(':selected').text();
        let car_data: object = this._carrental_data['companies_data'][selected_company]['cars'][selected_car];
        car_data['car_name'] = selected_car;
        car_data['company_name'] = selected_company;
        this.autoDetails(car_data);
    }

    private setCompanyDropdown(companies_data: object): void{
        let companies: string[] = Object.keys(companies_data);
        companies.forEach((company,index) => {
            let option: JQuery<HTMLOptionElement> = $('<option>');
            option.val(company);
            option.text(company);
            if(index == 0)
                option.prop("selected",true);
            this._carrental_company_el.append(option);
        });
        let selected_company: string = this._carrental_company_el.find('option:selected').text();
        this.setCompanyCarsDropdown(companies_data[selected_company]['cars']);
    }

    private setCountryDropdowns(available_locations: object): void{
        let locations_lists: string[] = Object.keys(available_locations);
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
            this._pickup_country_el.append(option_pickup);
            this._delivery_country_el.append(option_delivery);
        });
        let selected_pickup_location: string = this._pickup_country_el.find('option:selected').text();
        let selected_delivery_location: string = this._delivery_country_el.find('option:selected').text();
        this.setLocationDropdown(this._pickup_location_el, available_locations[selected_pickup_location]);
        this.setLocationDropdown(this._delivery_location_el, available_locations[selected_delivery_location]);
    }

    private setDropDownEvents(): void{
        this._carrental_company_el.on('change',()=>{
            let selected_company: string = this._carrental_company_el.find('option').filter(':selected').text();
            this.setCompanyCarsDropdown(this._carrental_data['companies_data'][selected_company]['cars']);
        });
        this._car_model_el.on('change',()=>{
            let selected_car: string = this._car_model_el.find('option').filter(':selected').text();
            let selected_company: string = this._carrental_company_el.find('option').filter(':selected').text();
            let car_data: object = this._carrental_data['companies_data'][selected_company]['cars'][selected_car];
            car_data['car_name'] = selected_car;
            car_data['company_name'] = selected_company;
            this.autoDetails(car_data);
        });
        this._pickup_country_el.on('change',()=>{
            let selected_country: string = this._pickup_country_el.find('option').filter(':selected').text();
            this.setLocationDropdown(this._pickup_location_el,this._carrental_data['available_locations'][selected_country]);
        });
        this._delivery_country_el.on('change',()=>{
            let selected_country: string = this._delivery_country_el.find('option').filter(':selected').text();
            this.setLocationDropdown(this._delivery_location_el,this._carrental_data['available_locations'][selected_country]);
        });
    }

    private setLocationDropdown(select_el: JQuery<HTMLSelectElement>, country_location: object): void{
        let locations: string[] = Object.keys(country_location);
        locations.forEach((location,index) => {
            let option: JQuery<HTMLOptionElement> = $('<option>');
            option.val(location);
            option.text(location);
            if(index == 0){
                option.prop("selected",true);
            }
            select_el.append(option);
        })
    }

}
import CarRentalHtmlInterface from "../../interfaces/carrental/carrentalhtml.interface";
import { Constants } from "../../values/constants";
import { AutoChangeTypes, AutoPowerSupplies } from "../../values/enums";

export default class CarRentalHtml{

    private _car_name: string;
    private _company_name: string;
    private _day_price: number;
    private _baggages: string;
    private _change: AutoChangeTypes;
    private _div_images: JQuery<HTMLDivElement>;
    private _div_info: JQuery<HTMLDivElement>;
    private _doors: number;
    private _power_supply: AutoPowerSupplies;
    private _seats: number;
    private _images: number;

    private static URL_CARRENTAL_IMG: string = Constants.STATIC_URL_IMG_CARRENTAL;

    constructor(data: CarRentalHtmlInterface){
        this.setValues(data);
        this.setCarRentalInfoTable();
        this.setCarImagesDiv();
    }

    get car_name(){ return this._car_name; }
    get company_name(){ return this._company_name; }
    get day_price(){ return this._day_price; }
    get baggages(){ return this._baggages; }
    get change(){ return this._change; }
    get doors(){ return this._doors; }
    get power_supply(){ return this._power_supply; }
    get seats(){ return this._seats; }
    get images(){ return this._images; }

    private setValues(data: CarRentalHtmlInterface): void{
        this._car_name = data.car_name;
        this._company_name = data.company_name;
        this._day_price = data.day_price;
        this._baggages = data.details.baggages;
        this._change = data.details.change;
        this._doors = data.details.doors;
        this._power_supply = data.details.power_supply;
        this._seats = data.details.seats;
        this._images = data.images;
        this._div_images = $('#'+data.html_elements_id.images);
        this._div_info = $('#'+data.html_elements_id.info);
    }

    /**
     * Display the information about the selected car
     */
    private setCarRentalInfoTable(): void{
        let html: string = `
<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row">ALIMENTAZIONE</th>
            <td>${this._power_supply}</td>
        </tr>
        <tr>
            <th scope="row">PORTE</th>
            <td>${this._doors}</td>
        </tr>
        <tr>
            <th scope="row">BAGAGLI</th>
            <td>${this._baggages}</td>
        </tr>
        <tr>
            <th scope="row">CAMBIO</th>
            <td>${this._change}</td>
        </tr>
        <tr>
            <th scope="row">POSTI</th>
            <td>${this._seats}</td>
        </tr>
        <tr>
            <th scope="row">PREZZO 1 GIORNO</th>
            <td>${this._day_price}</td>
        </tr>
    </tbody>
</table>        
        `;
        this._div_info.html(html);
    }

    /**
     * Display the images about the selected car
     */
    private setCarImagesDiv(): void{
        let prefix: string = this.setImagesPrefix();
        let html: string = `
<div class="container-fluid">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2">
        `;
        for(let i = 1; i <= this._images; i++){
            html += `
<div class="col">
    <img src="${prefix}${i}.jpg" alt="${this._car_name}" title="${this._car_name}">
</div>
            `;
        }
        html += `
    </div>
</div>    
        `;
        this._div_images.html(html);
    }

    /**
     * Set the prefix from which load the car images
     * @returns the dir of car images
     */
    private setImagesPrefix(): string{
        let prefix: string = `${CarRentalHtml.URL_CARRENTAL_IMG}/${this._company_name}/${this._car_name}/${this._car_name}_`;
        let regex: RegExp = new RegExp("[\\s\\-&]","g");
        let regex2: RegExp = new RegExp("[+()]","g");
        prefix = prefix.replace(regex,'_');
        prefix = prefix.replace(regex2,'');
        return prefix;
    }
}
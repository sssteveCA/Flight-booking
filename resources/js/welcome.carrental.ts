import CarRental from "./classes/carrental/carrental";
import CarRentalInterface from "./interfaces/carrental/carrental.interface";


/**
 * Get the rentable cars info 
 */
export function loadCarRentalInfo(): void{
    let cr_data: CarRentalInterface = {
        carrental_company_id: 'fb-rc-rent-company', car_model_id: 'fb-rc-car', pickup_country_id: 'fb-rc-pickup-country', pickup_location_id: 'fb-rc-pickup-location', delivery_country_id: 'fb-rc-delivery-country', delivery_location_id: 'fb-rc-delivery-location', rent_start_id: 'fb-rc-rentstart', rent_end_id: 'fb-rc-rentend', age_range_id: 'fb-rc-age-range'
    }
    let cr: CarRental = new CarRental(cr_data);
    cr.carRental().then(res => {

    });
}
import AirportsAvailable from "./classes/flight/airportsavailable";
import FlightEventsHtml from "./classes/flight/flighteventshtml";
import FlightEventsList from "./classes/flight/flighteventslist";
import FlightLocationList from "./classes/flight/flightlocationlist";
import AirportsAvailableInterface from "./interfaces/flight/airportsavailable.interface";
import FlightLocationAirportsInterface from "./interfaces/flight/flightlocationairports.interface";
import FlightLocationCompaniesInterface from "./interfaces/flight/flightlocationcompanies.interface";
import FlightLocationCountriesInterface from "./interfaces/flight/flightlocationcountries.interface";
import { loadCarRentalInfo } from "./welcome.carrental";
import { loadFlightEventsInfo } from "./welcome.flightevents";
import {loadHotelInfo } from "./welcome.hotel";

$(()=>{
    let elements = {
        'nav_buttons' : $('button.nav-link'),
        'flight_tab' : {
            'elem' : {
                'fb-oneway-div': $('.fb-oneway-div'),
                'fb-roundtrip-div': $('.fb-roundtrip-div'),
                'flight-loc': $('.flight-loc'),
                'flight-type-radio': $('input[name=flight_type]')        
            },
            'id':{
                0: 'fb-from', 1: 'fb-to', 2: 'fb-company_name', 3: 'fb-from-airports', 4: 'fb-to-airports'
            }      
        }
    };
    loadAirportsData(elements);
    //loadCountries(elements);
    loadCompanies(elements);
    tabClickEvents(elements);
    setInputDate(elements);
});

/**
 * Load all the airport details data from server
 * @param elements 
 */
function loadAirportsData(elements: object): void{
    let aa_data: AirportsAvailableInterface = {
        country_departure_id: elements['flight_tab']['id'][0],
        country_arrival_id: elements['flight_tab']['id'][1],
        airport_departure_id: elements['flight_tab']['id'][3],
        airport_arrival_id: elements['flight_tab']['id'][4]
    };
    let aa: AirportsAvailable = new AirportsAvailable(aa_data);
    aa.airportsAvailable();
}

/**
 * Set input dates checking radio button status
 * @param elements 
 */
function setInputDate(elements: any): void{
    elements['flight_tab']['elem']['flight-type-radio'].on('change',() => {
        let value = elements['flight_tab']['elem']['flight-type-radio'].filter(':checked').val();
        if(value == 'oneway'){
            elements['flight_tab']['elem']['fb-roundtrip-div'].css('display','none');
            elements['flight_tab']['elem']['fb-oneway-div'].css('display','flex');
        }//if(value == 'oneway'){
        else if(value == 'roundtrip'){
            elements['flight_tab']['elem']['fb-oneway-div'].css('display','none');
            elements['flight_tab']['elem']['fb-roundtrip-div'].css('display','flex');
            
        }
    });//elements['flight_tab']['elem']['flight-type-radio'].on('change',() => {
    
}

/**
 * Get and set the companies name list in the proper select element
 * @param elements 
 */
function loadCompanies(elements: any): void{
    let fll: FlightLocationList = new FlightLocationList();
    let dataCn: FlightLocationCompaniesInterface = {
        id_companies_select : elements['flight_tab']['id'][2]
    };
    fll.get_flight_companies(dataCn).then(res => {

    }).catch(err => {

    })
}

//When a Bootstrap tab is clicked
function tabClickEvents(elements: any): void{
    elements['nav_buttons'].on('click',(event)=>{
        let clickbutton = event.currentTarget;
        let cb_dbt = clickbutton.getAttribute('data-bs-target');
        let cb_id = clickbutton.getAttribute('id');
        $(''+cb_dbt).css('display','block');
        $('div[role=tabpanel]:not('+cb_dbt+')').css('display','none');
        if(cb_id == 'hotel-tab'){
            //loadHotelData();
            loadHotelInfo();
        }
        else if(cb_id == 'car-rental-tab'){
            loadCarRentalInfo();
        }
        else if(cb_id == 'events-tab'){
           //User want see flight events list
           loadFlightEventsInfo();
        }//if(cb_id == 'events_tab'){
   });//elements['nav_buttons'].on('click',(event)=>{
}
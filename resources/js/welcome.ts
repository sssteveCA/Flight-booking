import FlightEventsList from "./classes/flight/flighteventslist";
import FlightLocationList from "./classes/flight/flightlocationlist";
import FlightLocationAirportsInterface from "./interfaces/flight/flightlocationairports.interface";
import FlightLocationCompaniesInterface from "./interfaces/flight/flightlocationcompanies.interface";
import FlightLocationCountriesInterface from "./interfaces/flight/flightlocationcountries.interface";

$(()=>{
    let elements = {
        'nav_buttons' : $('button.nav-link'),
        'flight_tab' : {
            'elem' : {
                'fb-oneway-div': $('.fb-oneway-div'),
                'fb-roundtrip-div': $('.fb-roundtrip-div'),
                'flight-loc': $('.flight-loc'),
                'flight-type-radio': $('input[name=flight-type]')        
            },
            'id':{
                0: 'fb-from',
                1: 'fb-to',
                2: 'fb-company_name'
            }      
        }
    };
    //console.log(elements);
    loadCountries(elements);
    loadCompanies(elements);
    tabClickEvents(elements);
    setInputDate(elements);
});

//Set input dates checking radio button status
function setInputDate(elements: any): void{
    elements['flight_tab']['elem']['flight-type-radio'].on('change',() => {
        let value = elements['flight_tab']['elem']['flight-type-radio'].filter(':checked').val();
        console.log(value);
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

//Load countries list from server
function loadCountries(elements: any): void{
    let fll: FlightLocationList = new FlightLocationList();
    let dataC: FlightLocationCountriesInterface = {
        id_from_select: elements['flight_tab']['id'][0],
        id_to_select: elements['flight_tab']['id'][1]
    }
    fll.get_countries(dataC).then(res => {
        let fired = $('#'+fll.id_from_select);
        let dataA: FlightLocationAirportsInterface = {
            country: fired.val() as string
        };
        fll.get_country_airports(dataA);
        fired = $('#'+fll.id_to_select);
        dataA = {
            country: fired.val() as string
        }
        fll.get_country_airports(dataA);
        onChangeSelect(elements);
    }).catch(err => {

    });
    
}

//Get and set the companies name list in the proper select element
function loadCompanies(elements: any): void{
    let fll: FlightLocationList = new FlightLocationList();
    let dataCn: FlightLocationCompaniesInterface = {
        id_companies_select : elements['flight_tab']['id'][2]
    };
    fll.get_flight_companies(dataCn).then(res => {

    }).catch(err => {

    })
}

//When select option change
function onChangeSelect(elements: any): void{
    elements['flight_tab']['elem']['flight-loc'].on('change',(event)=>{
        let fired = $(event.currentTarget);
        let fired_id = fired.attr('id');
        if(fired_id == elements['flight_tab']['id'][0]){
            //Country select from
            let dataA: FlightLocationAirportsInterface = {
                country: fired.val() as string,
                id_from_select: fired_id
            };
            let fll: FlightLocationList = new FlightLocationList();
            fll.get_country_airports(dataA);
        }//if(fired_id == elements['flight_tab']['id'][0]){
        else if(fired_id == elements['flight_tab']['id'][1]){
            //Country select to
            let dataA: FlightLocationAirportsInterface = {
                country: fired.val() as string,
                id_to_select: fired_id
            };
            let fll: FlightLocationList = new FlightLocationList();
            fll.get_country_airports(dataA);
        }//else if(fired_id == elements['flight_tab']['id'][1]){
    });
}

//When a Bootstrap tab is clicked
function tabClickEvents(elements: any): void{
    elements['nav_buttons'].on('click',(event)=>{
        let clickbutton = event.currentTarget;
        let cb_dbt = clickbutton.getAttribute('data-bs-target');
        let cb_id = clickbutton.getAttribute('id');
        $(''+cb_dbt).css('display','block');
        $('div[role=tabpanel]:not('+cb_dbt+')').css('display','none');
        if(cb_id == 'events-tab'){
           //User want see flight events list
           let fel:FlightEventsList = new FlightEventsList();
           fel.flight_events_request().then(response => {
               //console.log(fel.html);
               if(fel.errno == 0){
                   //No errors Happened
                   $('#events').html(fel.html);
               }
           }).catch(err => {

           });
        }//if(cb_id == 'events_tab'){
   });//elements['nav_buttons'].on('click',(event)=>{
}
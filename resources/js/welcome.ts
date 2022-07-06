import FlightEventsList from "./classes/flighteventslist";
import FlightLocationList from "./classes/flightlocationlist";
import FlightLocationAirportsInterface from "./interfaces/flightlocationairports.interface";
import FlightLocationCountriesInterface from "./interfaces/flightlocationcountries.interface";

$(()=>{
    let elements = {
        'nav_buttons' : $('button.nav-link'),
        'flight_tab' : {
            'flight-loc' : {
                'id':{
                    0: 'fb-from',
                    1: 'fb-to'
                }      
            },
        }
    };
    console.log(elements);

    let dataC: FlightLocationCountriesInterface = {
        id_from_select: elements['flight_tab']['flight-loc']['id'][0],
        id_to_select: elements['flight_tab']['flight-loc']['id'][1]
    }
    let fll: FlightLocationList = new FlightLocationList();
    fll.get_countries(dataC).then(res => {
        let dataA: FlightLocationAirportsInterface = {
            fired: $('#'+fll.id_from_select),
            country: $('#'+fll.id_from_select).val() as string
        };
        console.log(dataA);
        fll.get_country_airports(dataA);
        dataA = {
            fired: $('#'+fll.id_to_select),
            country: $('#'+fll.id_to_select).val() as string
        }
        fll.get_country_airports(dataA);
    }).catch(err => {

    });
    
    elements['nav_buttons'].on('click',(event)=>{
         let clickbutton = event.currentTarget;
         console.log(clickbutton);
         let cb_dbt = clickbutton.getAttribute('data-bs-target');
         let cb_id = clickbutton.getAttribute('id');
         console.log(cb_id);
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
});
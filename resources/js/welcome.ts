import FlightEventsList from "./classes/flighteventslist";

$(()=>{
    let buttons = $('button.nav-link');
    buttons.on('click',(event)=>{
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
                console.log(fel.html);
                if(fel.errno == 0){
                    //No errors Happened
                    $('#events').html(fel.html);
                }
            }).catch(err => {

            });
         }//if(cb_id == 'events_tab'){
    });
});
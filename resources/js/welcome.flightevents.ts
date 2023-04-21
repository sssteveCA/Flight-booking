import FlightEventsHtml from "./classes/flight/flighteventshtml";
import FlightEventsList from "./classes/flight/flighteventslist";

/**
 * Get the available flights for events 
 */
export function loadFlightEventsInfo(): void{
    let events_div: JQuery<HTMLDivElement> = $('#events');
    let fel:FlightEventsList = new FlightEventsList();
    fel.flight_events_request().then(response => {
        let feh: FlightEventsHtml = new FlightEventsHtml(fel.json);
            //No errors Happened
            events_div.html(feh.html);
    }).catch(err => {
        events_div.html(`
<div class="alert alert-danger" role="alert">${fel.error}</div>        
        `);
    });
}
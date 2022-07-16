import FlightDelete from "../classes/flightdelete";


$(function(){
    $('.fFlightDelete').on('submit', (e)=>{
        //User wants delete a flight
        e.preventDefault();
        let form = e.currentTarget;
        console.log(form);
    });//$('.fFlightDelete').on('submit', ()=>{
});
import FlightDelete from "../classes/flightdelete";
import FlightDeleteInterface from "../interfaces/flightdelete.interface";


$(function(){
    console.log("jQuery");
    $('.fFlightDelete').on('submit', (e)=>{
        //User wants delete a flight
        e.preventDefault();
        let form = $(e.currentTarget);
        console.log(form);
        let id = form.find('input[name=flight_id]');
        let id_val = $(id).val();
        let dataFd: FlightDeleteInterface = {
            id: id_val as number
        };
        let flightDelete = new FlightDelete(dataFd);
        flightDelete.deleteFlight().then(msg => {

        }).catch(err => {
            
        });
    });//$('.fFlightDelete').on('submit', ()=>{
});
import FlightDelete from "../classes/flight/flightdelete";
import FlightDeleteInterface from "../interfaces/flightdelete.interface";


$(function(){
    $('.fFlightDelete').on('submit', (e)=>{
        //User wants delete a flight
        e.preventDefault();
        let form = $(e.currentTarget);
        //console.log(form);
        let id = form.find('input[name=flight_id]');
        let id_val = $(id).val();
        let token = form.find('input[name=_token]');
        let token_str = $(token).val();
        let dataFd: FlightDeleteInterface = {
            id: id_val as number,
            token: token_str as string
        };
        console.log(dataFd);
        let flightDelete = new FlightDelete(dataFd);
        flightDelete.deleteFlight().then(msg => {

        }).catch(err => {

        });
    });//$('.fFlightDelete').on('submit', ()=>{
});
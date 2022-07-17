import ConfirmDialog from "../classes/dialog/confirmdialog";
import FlightDelete from "../classes/flight/flightdelete";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialoginterface";
import FlightDeleteInterface from "../interfaces/flight/flightdelete.interface";
import { Constants } from "../values/constants";


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
        let dataCd: ConfirmDialogInterface = {
            title: 'Elimina volo',
            message: Constants.MSG_CONFIRMDELETEFLIGHT
        }
        let cd: ConfirmDialog = new ConfirmDialog(dataCd);
        console.log("btYes");
        console.log($(cd.btYes));
        $(cd.btYes).on('click',()=>{
            
        });
        $(cd.btNo).on('click',()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
        /* let dataFd: FlightDeleteInterface = {
            id: id_val as number,
            token: token_str as string
        };
        console.log(dataFd);
        let flightDelete = new FlightDelete(dataFd);
        flightDelete.deleteFlight().then(msg => {

        }).catch(err => {

        }); */
    });//$('.fFlightDelete').on('submit', ()=>{
});
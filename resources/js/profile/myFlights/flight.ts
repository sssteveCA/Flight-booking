import ConfirmDialog from "../../classes/dialog/confirmdialog";
import MessageDialog from "../../classes/dialog/messagedialog";
import FlightDelete from "../../classes/flight/flightdelete";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import MessageDialogInterface from "../../interfaces/dialog/messagedialog.interface";
import { Constants } from "../../values/constants";
import FlightDeleteInterface from "../../interfaces/flight/flightdelete.interface";
import { dialogRemoveCd, dialogRemoveMd } from "../../general/functions";

$(function(){
    $('#fDelete').on('submit', (e)=>{
        //User wants delete a flight
        e.preventDefault();
        let form = $(e.currentTarget);
        let dataCd: ConfirmDialogInterface = {
            title: 'Elimina volo',
            message: Constants.MSG_CONFIRMDELETEFLIGHT
        }
        let confirmDialog: ConfirmDialog = new ConfirmDialog(dataCd);
        $(confirmDialog.btYes).on('click',()=>{
            confirmDialog.dialog.dialog('destroy');
            confirmDialog.dialog.remove();
            let id = form.find('input[name=flight_id]');
            let token = form.find('input[name=_token]');
            let dataFd: FlightDeleteInterface = {
                id: $(id).val() as number,
                token: $(token).val() as string
            };
            let flightDelete = new FlightDelete(dataFd);
            flightDelete.deleteFlight().then(obj => {
                //Response from delete request
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina volo',
                    message: obj[Constants.KEY_MESSAGE]
                };
                let messageDialog: MessageDialog = new MessageDialog(dataMd);
                $(messageDialog.btOk).on('click',()=>{
                    messageDialog.dialog.dialog('destroy');
                    messageDialog.dialog.remove();
                    //check if the delete operation was done successfully
                    if(obj[Constants.KEY_DONE] == true){
                        //Redirect to flights list page 
                        window.location.href = Constants.URL_FLIGHTSLIST;
                    }//if(obj[Constants.KEY_DONE] == true){   
                });
            }).catch(err => {
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina volo',
                    message: flightDelete.error as string
                };
                dialogRemoveMd(dataMd); 
            }); 
        });//$(confirmDialog.btYes).on('click',()=>{
        dialogRemoveCd(confirmDialog);  
    });//$('.fFlightDelete').on('submit', ()=>{
});
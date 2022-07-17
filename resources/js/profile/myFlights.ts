import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import FlightDelete from "../classes/flight/flightdelete";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialoginterface";
import MessageDialogInterface from "../interfaces/dialog/messagedialoginterface";
import FlightDeleteInterface from "../interfaces/flight/flightdelete.interface";
import { Constants } from "../values/constants";



$(function(){
    $('.fFlightDelete').on('submit', (e)=>{
        //User wants delete a flight
        e.preventDefault();
        let form = $(e.currentTarget);
        //console.log(form);
        let dataCd: ConfirmDialogInterface = {
            title: 'Elimina volo',
            message: Constants.MSG_CONFIRMDELETEFLIGHT
        }
        let confirmDialog: ConfirmDialog = new ConfirmDialog(dataCd);
        console.log("btYes");
        console.log($(confirmDialog.btYes));
        $(confirmDialog.btYes).on('click',()=>{
            confirmDialog.dialog.dialog('destroy');
            confirmDialog.dialog.remove();
            let id = form.find('input[name=flight_id]');
            let token = form.find('input[name=_token]');
            let dataFd: FlightDeleteInterface = {
                id: $(id).val() as number,
                token: $(token).val() as string
            };
            console.log(dataFd);
            let flightDelete = new FlightDelete(dataFd);
            flightDelete.deleteFlight().then(msg => {
                //Response from delete request
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina volo',
                    message: msg
                };
                let messageDialog: MessageDialog = new MessageDialog(dataMd);
                console.log("btOk");
                console.log(messageDialog.btOk);
                $(messageDialog.btOk).on('click',()=>{
                    messageDialog.dialog.dialog('destroy');
                    messageDialog.dialog.remove();
                    //Get the parent elements of the form submitted
                    let divParents = form.parents();
                    //Get the row to delete
                    let row = divParents.eq(1);
                    $(row).remove();
                });
            }).catch(err => {
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina volo',
                    message: flightDelete.error as string
                };
                let messageDialog: MessageDialog = new MessageDialog(dataMd);
                $(messageDialog.btOk).on('click',()=>{
                    messageDialog.dialog.dialog('destroy');
                    messageDialog.dialog.remove();
                });
            }); 
        });//$(confirmDialog.btYes).on('click',()=>{
        $(confirmDialog.btNo).on('click',()=>{
            confirmDialog.dialog.dialog('destroy');
            confirmDialog.dialog.remove();
        });//$(cd.btNo).on('click',()=>{}  
    });//$('.fFlightDelete').on('submit', ()=>{
});
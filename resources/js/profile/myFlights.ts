import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import FlightDelete from "../classes/flight/flightdelete";
import { dialogRemoveCd, dialogRemoveMd } from "../general/functions";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialog.interface";
import MessageDialogInterface from "../interfaces/dialog/messagedialog.interface";
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
        $(confirmDialog.btYes).on('click',()=>{
            confirmDialog.dialog.dialog('destroy');
            confirmDialog.dialog.remove();
            let id = form.find('input[name=flight_id]');
            let token = form.find('input[name=_token]');
            let dataFd: FlightDeleteInterface = {
                id: $(id).val() as number,
                token: $(token).val() as string
            };
            //console.log(dataFd);
            let flightDelete = new FlightDelete(dataFd);
            //Search for the spinner near the button clicked
            let spinner: JQuery = form.parent('div').children('div').find('div');
            //console.log(spinner);
            spinner.removeClass("d-none");
            flightDelete.deleteFlight().then(obj => {
                spinner.addClass("d-none");
                /* console.log("obj");
                console.log(obj);  */
                //Response from delete request
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina volo',
                    message: obj[Constants.KEY_MESSAGE]
                };
                let messageDialog: MessageDialog = new MessageDialog(dataMd);
                $(messageDialog.btOk).on('click',()=>{
                    messageDialog.dialog.dialog('destroy');
                    messageDialog.dialog.remove();
                    //remove the row if the delete operation was done successfully
                    if(obj['deleted'] == true){
                        //Get the parent elements of the form submitted
                        let divParents = form.parents();
                        //Get the row to delete
                        let row = divParents.eq(1);
                        $(row).remove();
                    }//if(obj['deleted'] == true){   
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


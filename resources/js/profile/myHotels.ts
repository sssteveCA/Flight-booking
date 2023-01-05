import ConfirmDialog from "../classes/dialog/confirmdialog";
import { dialogRemoveCd } from "../general/functions";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialog.interface";
import { Constants } from "../values/constants";

$(()=>{
    $('.fHotelDelete').on('submit',(e)=>{
        e.preventDefault();
        let form = $(e.currentTarget);
        let dataCd: ConfirmDialogInterface = {
            title: 'Elimina prenotazione stanza',
            message: Constants.MSG_CONFIRMDELETEHOTEL
        }
        let confirmDialog: ConfirmDialog = new ConfirmDialog(dataCd);
        confirmDialog.btYes.on('click',()=>{
            let id = form.find('input[name=hotel_id]');
            let token = form.find('input[name=_token');
        });
        dialogRemoveCd(confirmDialog);
    });
})
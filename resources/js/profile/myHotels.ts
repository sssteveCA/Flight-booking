import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import HotelDelete from "../classes/hotel/hoteldelete";
import { bootstrapMessage, dialogRemoveCd, dialogRemoveMd } from "../general/functions";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialog.interface";
import MessageDialogInterface from "../interfaces/dialog/messagedialog.interface";
import HotelDeleteInterface from "../interfaces/hotel/hoteldelete.interface";
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
            confirmDialog.dialog.dialog('destroy');
            confirmDialog.dialog.remove();
            let id = form.find('input[name=hotel_id]');
            let token = form.find('input[name=_token');
            let spinner: JQuery<HTMLDivElement> = form.parent('div').children('div').find('div') as JQuery<HTMLDivElement>;
            spinner.removeClass('d-none');
            let hdData: HotelDeleteInterface = {
                id: $(id).val() as number,
                token: $(token).val() as string
            }
            let hd: HotelDelete = new HotelDelete(hdData);
            hd.deleteHotel().then(obj => {
                spinner.addClass('d-none');
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina prenotazione stanza',
                    message: obj[Constants.KEY_MESSAGE]
                }
                let messageDialog: MessageDialog = new MessageDialog(dataMd);
                messageDialog.btOk.on('click',()=>{
                    messageDialog.dialog.dialog('destroy');
                    messageDialog.dialog.remove();
                    if(obj[Constants.KEY_DONE] == true){
                        let divParents = form.parents('div');
                        let row = divParents.eq(1);
                        $(row).remove();
                        let hc_html = $('#hotels-container').html();
                        if(hc_html.trim() == ""){
                            let message = bootstrapMessage("Lista stanze vuota", "Lista delle stanze d'albergo prenotate vuota")
                            $('#main-container').append(message)
                        }
                    }
                });
            }).catch(err => {
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina prenotazione stanza',
                    message: hd.error as unknown as string
                }
                dialogRemoveMd(dataMd);
            })
        });
        dialogRemoveCd(confirmDialog);
    });
})
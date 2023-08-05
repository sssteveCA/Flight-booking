import CarRentalDelete from "../classes/carrental/carrentaldelete";
import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import { bootstrapMessage, dialogRemoveCd, dialogRemoveMd } from "../general/functions";
import CarRentalDeleteInterface from "../interfaces/carrental/carrentaldelete.interface";
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialog.interface";
import MessageDialogInterface from "../interfaces/dialog/messagedialog.interface";
import { Constants } from "../values/constants";


$(()=>{
    $('.fCarDelete').on('submit', (e)=>{
        e.preventDefault();
        let form = $(e.currentTarget);
        let dataCd: ConfirmDialogInterface = {
            title: 'Elimina auto noleggiata',
            message: Constants.MSG_CONFIRMDELETECAR
        }
        let cd: ConfirmDialog = new ConfirmDialog(dataCd);
        cd.btYes.on('click',()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
            let id = form.find('input[name=car_id]');
            let token = form.find('input[name=_token]');
            let spinner: JQuery<HTMLDivElement> = form.parent('div').children('div').find('div') as JQuery<HTMLDivElement>;
            spinner.removeClass('d-none');
            let crData: CarRentalDeleteInterface = {
                id: $(id).val() as number,
                token: $(token).val() as string
            }
            let cr: CarRentalDelete = new CarRentalDelete(crData);
            cr.deleteCar().then(obj => {
                spinner.addClass('d-none');
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina auto noleggiata',
                    message: obj[Constants.KEY_MESSAGE]
                }
                let md: MessageDialog = new MessageDialog(dataMd);
                md.btOk.on('click', ()=> {
                    md.dialog.dialog('destroy');
                    md.dialog.remove();
                    if(obj[Constants.KEY_DONE] == true){
                        let divParents = form.parents('div');
                        let row = divParents.eq(1);
                        $(row).remove();
                        let cc_html = $('#cars-container').html();
                        if(cc_html.trim() == ""){
                            let message = bootstrapMessage("Lista auto vuota", "Lista delle auto noleggiate vuota");
                            $('#main-container').append(message);
                        }
                    }
                });
            }).catch(err => {
                let dataMd: MessageDialogInterface = {
                    title: 'Elimina auto noleggiata',
                    message: cr.error as unknown as string
                }
                dialogRemoveMd(dataMd);
            })

        })
        dialogRemoveCd(cd);
    })
})
import ConfirmDialogInterface from "../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../classes/dialog/confirmdialog";
import { Constants } from "../values/constants";

$(()=>{
    $('#logout-item').on('click',(e: JQuery.Event)=>{
        e.preventDefault();
        //User click in logout item
        let cd_data: ConfirmDialogInterface = {
            title: 'Esci dalla sessione',
            message: Constants.MSG_CONFIRMLOGOUT
        };
        let cd: ConfirmDialog = new ConfirmDialog(cd_data);
        cd.btYes.on('click', (e: JQuery.Event)=>{
            //Logout confirmed
            e.preventDefault();
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
            $('#logout-form').trigger('submit');
        });
        cd.btNo.on('click',(e: JQuery.Event)=>{
            //Logout canceled
            e.preventDefault();
            cd.dialog.dialog('destroy');
            cd.dialog.remove();    
        });
    });
});

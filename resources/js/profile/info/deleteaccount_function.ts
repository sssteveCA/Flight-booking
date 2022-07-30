import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import { Constants } from "../../values/constants";

export default function deleteAccount(): void{
    $('#divDeleteAccount button').on('click',()=>{
        //User clicks delete account button
        let cd_data: ConfirmDialogInterface = {
            title: 'Elimina account',
            message: Constants.MSG_CONFIRMDELETEACCOUNT
        };
        let cd: ConfirmDialog = new ConfirmDialog(cd_data);
        cd.btYes.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
        cd.btNo.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
}
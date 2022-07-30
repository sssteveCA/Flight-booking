import { Constants } from "../../values/constants";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import { TextFieldDialogInterface, InputProp } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "../../classes/dialog/textfieldsdialog";

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
            let tfd_data: TextFieldDialogInterface = {
                title: 'Conferma la password per procedere',
                inputs_prop: [
                    {
                        label_str: 'Password',
                        input_id: 'password',
                        input_name: 'password',
                        input_type: 'password'
                    },
                    {
                        label_str: 'Conferma password',
                        input_id: 'password_conf',
                        input_name: 'password_conf',
                        input_type: 'password'
                    }
                ]   
            };
            let tfd: TextFieldsDialog = new TextFieldsDialog(tfd_data);
            tfd.btOk.on('click',()=>{
                tfd.dialog.dialog('destroy');
                tfd.dialog.remove();
            });
            tfd.btCancel.on('click',()=>{
                tfd.dialog.dialog('destroy');
                tfd.dialog.remove();
            });
        });
        cd.btNo.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
}
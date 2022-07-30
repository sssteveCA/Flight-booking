import { Constants } from "../../values/constants";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import { TextFieldDialogInterface, InputProp } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "../../classes/dialog/textfieldsdialog";
import DeleteAccountInterface from "../../interfaces/profile/deleteaccout.interface";
import DeleteAccount from "../../classes/profile/deleteaccount";
import MessageDialogInterface from "../../interfaces/dialog/messagedialog.interface";
import MessageDialog from "../../classes/dialog/messagedialog";

export default function deleteAccount(): void{
    $('#divDeleteAccount button').on('click',()=>{
        //User clicks delete account button
        let cd_data: ConfirmDialogInterface = {
            title: 'Elimina account',
            message: Constants.MSG_CONFIRMDELETEACCOUNT
        };
        let cd: ConfirmDialog = new ConfirmDialog(cd_data);
        cd.btYes.on('click', ()=>{
            //User confirms for deleting his account
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
                //User submit the password inputs dialog
               /*  tfd.dialog.dialog('destroy');
                tfd.dialog.remove(); */
                let da_data: DeleteAccountInterface = {
                    token: '',
                    password: $('#'+tfd.inputs_prop[0].input_id).val() as string,
                    password_conf: $('#'+tfd.inputs_prop[1].input_id).val() as string
                };
                let da: DeleteAccount = new DeleteAccount(da_data);
                da.deleteAccount().then(obj_response => {
                    //Delete account request
                    let md_data: MessageDialogInterface = {
                        title: 'Elimina account',
                        message: obj_response[Constants.KEY_MESSAGE]
                    };
                    let md: MessageDialog = new MessageDialog(md_data);
                    md.btOk.on('click',()=>{
                        //OK Click in final message dialog
                        md.dialog.dialog('destroy');
                        md.dialog.remove();
                        if(obj_response[Constants.KEY_STATUS] == 'OK'){
                            //Remove also TextFieldDialog if delete request was done successfully
                            tfd.dialog.dialog('destroy');
                            tfd.dialog.remove();
                        }
                    });// md.btOk.on('click',()=>{
                });
            });//tfd.btOk.on('click',()=>{
            tfd.btCancel.on('click',()=>{
                tfd.dialog.dialog('destroy');
                tfd.dialog.remove();
            });
        });//cd.btYes.on('click', ()=>{
        cd.btNo.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
}
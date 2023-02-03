import { Constants } from "../../values/constants";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import { TextFieldDialogInterface, InputProp } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "../../classes/dialog/textfieldsdialog";
import DeleteAccountInterface from "../../interfaces/profile/deleteaccout.interface";
import DeleteAccount from "../../classes/profile/deleteaccount";
import MessageDialogInterface from "../../interfaces/dialog/messagedialog.interface";
import MessageDialog from "../../classes/dialog/messagedialog";
import PasswordConfirmDialogInterface from "../../interfaces/dialog/passwordconfirmdialog.interface";
import PasswordConfirmDialog from "../../classes/dialog/passwordconfirmdialog";

export default function deleteAccount(): void{
    let da_spinner: JQuery = $('#da-spinner');
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
                        label_str: 'Password', input_id: 'password', input_name: 'password', input_type: 'password'
                    },
                    {
                        label_str: 'Conferma password', input_id: 'password_conf', input_name: 'password_conf', input_type: 'password'
                    }
                ]   
            }
            let pcd_data: PasswordConfirmDialogInterface = {
                tfd_data: tfd_data, cb_show_id: 'pcd_cb_show'
            }
            let pcd: PasswordConfirmDialog = new PasswordConfirmDialog(pcd_data);
            pcd.btOk.on('click',()=>{
                //User submit the password inputs dialog
               /*  pcd.dialog.dialog('destroy');
                pcd.dialog.remove(); */
                da_spinner.removeClass("d-none");
                let csrf = $('meta[name="csrf-token"]').attr('content');
                let da_data: DeleteAccountInterface = {
                    token: csrf as string,
                    password: $('#'+pcd.inputs_prop[0].input_id).val() as string,
                    password_conf: $('#'+pcd.inputs_prop[1].input_id).val() as string
                };
                /* console.log("DeleteAccount functions da_data");
                console.log(da_data); */
                let da: DeleteAccount = new DeleteAccount(da_data);
                da.deleteAccount().then(obj_response => {
                    da_spinner.addClass("d-none");
                    //console.log(obj_response);
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
                            pcd.dialog.dialog('destroy');
                            pcd.dialog.remove();
                            window.location.href = '/';
                        }
                    });// md.btOk.on('click',()=>{
                });
            });//pcd.btOk.on('click',()=>{
            pcd.btCancel.on('click',()=>{
                pcd.dialog.dialog('destroy');
                pcd.dialog.remove();
            });
        });//cd.btYes.on('click', ()=>{
        cd.btNo.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
}
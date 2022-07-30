import { Constants } from "../../values/constants";
import MessageDialog from "../../classes/dialog/messagedialog";
import MessageDialogInterface from "../../interfaces/dialog/messagedialoginterface";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialoginterface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import EditUsername from "../../classes/profile/editusername";
import EditUsernameInterface from "../../interfaces/profile/editusername.interface";

export default function editUsernameForm(): void{
    $('#fEditUsername').on('submit',(e: JQuery.Event)=>{
        //Edit username form submitted
        e.preventDefault();
        let cd_data: ConfirmDialogInterface = {
            title: 'Modifica nome utente',
            message: Constants.MSG_CONFIRMEDITUSERNAME
        };
        let cd: ConfirmDialog = new ConfirmDialog(cd_data);
        cd.btYes.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
            let eu_data: EditUsernameInterface = {
                username: $('#username').val() as string,
                token: $('#fEditUsername input[name=_token]').eq(0).val() as string
            };
            let editUsername: EditUsername = new EditUsername(eu_data);
            editUsername.editUsername().then(res => {
                let md_data: MessageDialogInterface = {
                    title: 'Modifica username',
                    message: res
                };
                let md: MessageDialog = new MessageDialog(md_data);
                md.btOk.on('click', ()=>{
                    md.dialog.dialog('destroy');
                    md.dialog.remove();
                });
            });
        });//cd.btYes.on('click', ()=>{
        cd.btNo.on('click',()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
}
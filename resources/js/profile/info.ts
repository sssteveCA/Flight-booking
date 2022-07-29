import ConfirmDialogInterface from "../interfaces/dialog/confirmdialoginterface";
import MessageDialogInterface from "../interfaces/dialog/messagedialoginterface";
import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import { Constants } from "../values/constants";
import EditUsername from "../classes/profile/editusername";
import EditUsernameInterface from "../interfaces/profile/editusername.interface";
import EditPasswordInterface from "../interfaces/profile/editpassword.interface";
import EditPassword from "../classes/profile/editpassword";

$(()=>{
    showPassword();
    editUsernameForm();
    editPasswordForm();
});

function showPassword(): void{
    //detect showPassword checkbox changes
    $('#showPassword').on('change',function(){
        //console.log("ShowPassword change");
        var checked = $(this).is(":checked");
        if(checked){
            $('#oldpwd').attr('type','text');
            $('#newpwd').attr('type','text');
            $('#confnewpwd').attr('type','text');
        }
        else{
            $('#oldpwd').attr('type','password');
            $('#newpwd').attr('type','password');
            $('#confnewpwd').attr('type','password');
        }
    });
}

function editUsernameForm(): void{
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

function editPasswordForm(): void{
    $('#fEditPassword').on('submit',(e: JQuery.Event)=> {
        //Edit password form submitted
        e.preventDefault();
        let cd_data: ConfirmDialogInterface = {
            title: 'Modifica password',
            message: Constants.MSG_CONFIRMEDITPASSWORD
        };
        let cd: ConfirmDialog = new ConfirmDialog(cd_data);
        cd.btYes.on('click', ()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
            let ep_data: EditPasswordInterface = {
                oldpwd: $('#oldpwd').val() as string,
                newpwd: $('#newpwd').val() as string,
                confnewpwd: $('#confnewpwd').val() as string,
                token: $('#fEditPassword input[name=_token]').eq(0).val() as string
            };
            let editPassword: EditPassword = new EditPassword(ep_data);
            editPassword.editPassword().then(res => {
                let md_data: MessageDialogInterface = {
                    title: 'Modifica password',
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
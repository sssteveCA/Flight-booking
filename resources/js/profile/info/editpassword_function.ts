import { Constants } from "../../values/constants";
import MessageDialog from "../../classes/dialog/messagedialog";
import MessageDialogInterface from "../../interfaces/dialog/messagedialog.interface";
import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialog.interface";
import ConfirmDialog from "../../classes/dialog/confirmdialog";
import EditPasswordInterface from "../../interfaces/profile/editpassword.interface";
import EditPassword from "../../classes/profile/editpassword";

export function showPassword(): void{
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

export function editPasswordForm(): void{
    let ep_spinner: JQuery = $('#ep-spinner');
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
            ep_spinner.removeClass("d-none");
            let ep_data: EditPasswordInterface = {
                oldpwd: $('#oldpwd').val() as string,
                newpwd: $('#newpwd').val() as string,
                confnewpwd: $('#confnewpwd').val() as string,
                token: $('#fEditPassword input[name=_token]').eq(0).val() as string
            };
            let editPassword: EditPassword = new EditPassword(ep_data);
            editPassword.editPassword().then(res => {
                ep_spinner.addClass("d-none");
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
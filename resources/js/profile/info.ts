import ConfirmDialogInterface from "../interfaces/dialog/confirmdialoginterface";
import MessageDialogInterface from "../interfaces/dialog/messagedialoginterface";
import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import { Constants } from "../values/constants";

$(()=>{
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
        });
        cd.btNo.on('click',()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
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
        });
        cd.btNo.on('click',()=>{
            cd.dialog.dialog('destroy');
            cd.dialog.remove();
        });
    });
});
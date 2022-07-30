import MessageDialog from "./classes/dialog/messagedialog";
import MessageDialogInterface from "./interfaces/dialog/messagedialog.interface";
import Email from "./classes/email";
import EmailInterface from "./interfaces/email.interface";

$(function(){
    $('form#fContacts').on('submit',(e)=>{
        e.preventDefault();
        let email_data: EmailInterface = {
            name: $('#name').val() as string,
            email: $('#email').val() as string,
            subject: $('#subject').val() as string,
            message: $('#message').val() as string,
            token: $('input[name=_token]').eq(0).val() as string
        };
        console.log(email_data);
        let email: Email = new Email(email_data);
        email.sendEmail().then(message => {
            console.log(`sendEmail message => ${message}`);
            let md_data: MessageDialogInterface = {
                title: 'Email',
                message: message
            };
            let md: MessageDialog = new MessageDialog(md_data);
            md.btOk.on('click',function(){
                md.dialog.dialog('destroy');
                md.dialog.remove();
            });
        });//email.sendEmail().then(message => {
    });
});
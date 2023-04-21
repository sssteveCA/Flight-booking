import MessageDialog from "./classes/dialog/messagedialog";
import MessageDialogInterface from "./interfaces/dialog/messagedialog.interface";
import Email from "./classes/email";
import EmailInterface from "./interfaces/email.interface";

$(function(){
    let contacts_spinner: JQuery = $('#contacts-spinner');
    $('form#fContacts').on('submit',(e)=>{
        e.preventDefault();
        contacts_spinner.removeClass("d-none");
        let email_data: EmailInterface = {
            name: $('#name').val() as string,
            email: $('#email').val() as string,
            subject: $('#subject').val() as string,
            message: $('#message').val() as string,
            token: $('input[name=_token]').eq(0).val() as string
        };
        let email: Email = new Email(email_data);
        email.sendEmail().then(message => {
            contacts_spinner.addClass("d-none");
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
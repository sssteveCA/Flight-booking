import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import MessageDialogInterface from "../interfaces/dialog/messagedialog.interface";

/**
 * Close the message dialog on OK button click
 * @param dataMd the data to pass to the MessageDialog class
 */
export function dialogRemoveMd(dataMd: MessageDialogInterface): void{
    let messageDialog: MessageDialog = new MessageDialog(dataMd);
    $(messageDialog.btOk).on('click',()=>{
        messageDialog.dialog.dialog('destroy');
        messageDialog.dialog.remove();
    });
}

/**
 * Close the confirm dialog on NO button click
 * @param confirmDialog the data to pass to the ConfirmDialog class
 */
export function dialogRemoveCd(confirmDialog: ConfirmDialog): void{
    $(confirmDialog.btNo).on('click',()=>{
        confirmDialog.dialog.dialog('destroy');
        confirmDialog.dialog.remove();
    });//$(cd.btNo).on('click',()=>{}  
}

/**
 * Place a bootstrap message in the HTML page
 * @param title 
 * @param message 
 */
export function bootstrapMessage(title: string, message: string): string{
        return `
<div class="container mt-5">
    <h2 class="mt-5 text-center">${title}</h2>
    <p class="lead text-center">${message}</p>
</div>  
        `;
}
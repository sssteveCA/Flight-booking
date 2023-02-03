import { TextFieldDialogInterface } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "./textfieldsdialog";

export default class PasswordConfirmDialog extends TextFieldsDialog{

    constructor(data: TextFieldDialogInterface){
        super(data);
        this.addShowHidePassword();
    }

    private addShowHidePassword(): void{
        this._dialog_body += `
<div class="my-2 form-check">
    <input type="checkbox" class="form-check-input" id="pcd_show-hide-pwd">
    <label class="form-check-label">Mostra password</label>
</div>
        `;
    }
}
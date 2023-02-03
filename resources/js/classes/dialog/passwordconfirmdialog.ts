import PasswordConfirmDialogInterface from "../../interfaces/dialog/passwordconfirmdialog.interface";
import { TextFieldDialogInterface } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "./textfieldsdialog";

export default class PasswordConfirmDialog extends TextFieldsDialog{

    constructor(data: PasswordConfirmDialogInterface){
        super(data.tfd_data);
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

    private setCbEvents(): void{

    }
}
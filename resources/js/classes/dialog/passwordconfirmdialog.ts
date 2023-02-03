import PasswordConfirmDialogInterface from "../../interfaces/dialog/passwordconfirmdialog.interface";
import { TextFieldDialogInterface } from "../../interfaces/dialog/textfieldsdialog.interface";
import TextFieldsDialog from "./textfieldsdialog";

export default class PasswordConfirmDialog extends TextFieldsDialog{

    private _cb_show_id: string;

    constructor(data: PasswordConfirmDialogInterface){
        super(data.tfd_data);
        this._cb_show_id = data.cb_show_id;
        this.addShowHidePassword();
        this.setCbEvents();
    }

    get cb_show_id(){return this._cb_show_id;}

    private addShowHidePassword(): void{
        this._dialog_body += `
<div class="my-2 form-check">
    <input type="checkbox" class="form-check-input" id="${this._cb_show_id}">
    <label class="form-check-label">Mostra password</label>
</div>
        `;
    }

    private setCbEvents(): void{
        let cb_show: JQuery<HTMLInputElement> = $('#'+this._cb_show_id);
        cb_show.on('change',(ev)=>{
            if($(ev.target).is(':checked')){
                $('#'+this._inputs_prop[0].input_id).attr('type','text');
                $('#'+this._inputs_prop[1].input_id).attr('type','text');
            }
            else{
                $('#'+this._inputs_prop[0].input_id).attr('type','password');
                $('#'+this._inputs_prop[1].input_id).attr('type','password'); 
            }
        });
    }
}
import {TextFieldDialogInterface, InputProp} from "../../interfaces/dialog/textfieldsdialog.interface";


//Dialog that contains one or more labels and inputs field
export default class TextFieldsDialog{
    private _title: string;
    private _inputs_prop: InputProp[];
    private _id: string;
    private _width: number|string;
    private _height: number|string;
    private _dialog: JQuery;
    private _dialog_body: string; //Dialog HTML content
    private _btOk: JQuery;
    private _btCancel: JQuery;

    constructor(data: TextFieldDialogInterface){
        this._title = data.title;
        this._inputs_prop = data.inputs_prop;
        if(data.hasOwnProperty('id'))
            this._id = data.id as string;
        else this._id = 'dialog';
        if(data.hasOwnProperty('width'))
            this._width = data.width as number;
        else this._width = 'auto';
        if(data.hasOwnProperty('height'))
            this._height = data.height as number;
        else this._height = 'auto';
        this.setDialog();
    }

    get title(){return this._title;}
    get inputs_prop(){return this._inputs_prop;}
    get id(){return this._id;}
    get width(){return this._width;}
    get height(){return this._height;}
    get dialog(){return this._dialog;}
    get dialog_body(){return this._dialog_body;}
    get btOk(){return this._btOk;}
    get btCancel(){return this._btCancel;}

    private setDialog(): void{
        this.setDialogBody();
        let content = this._dialog_body;
        this._dialog = $('<div>');
        this._dialog.attr('id',this._id);
        this._dialog.appendTo($('body'));
        this._dialog.dialog({
            closeOnEscape: false,
            draggable: false,
            height: this._height,
            modal: true,
            resizable: false,
            title: this._title,
            width: this._width,
            buttons: [
                {
                    text: 'OK',
                    click: function(){
                    }
                },{
                    text: 'ANNULLA',
                    click: function(){

                    }
                }
            ],
            close: function(){
            },
            open: function(){
                $(this).html(content);
            }
        });
    }

    //Set the HTML dialog content
    private setDialogBody(): void{
        this._dialog_body = '';
        this._inputs_prop.forEach((input)=>{
            if(typeof input.input_value === "undefined")
                input.input_value = '';
            this._dialog_body += `
            <div class="my-3">
                <label for="${input.input_id}" class="form-label">
                    ${input.label_str}
                </label>
                <input type="${input.input_type}" id="#${input.input_id}" class="form-control" name="${input.input_name}" value="${input.input_value}">
            </div>
            `;
        });
    }

}
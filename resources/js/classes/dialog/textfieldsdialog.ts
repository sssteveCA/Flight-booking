import {TextFieldDialogInterface, InputProp} from "../../interfaces/dialog/textfieldsdialog.interface";


//Dialog that contains one or more labels and inputs field
export default class TextFieldsDialog{
    private _title: string;
    private _inputs_prop: InputProp[];
    private _id: string;
    private _width: number|string;
    private _height: number|string;
    private _dialog: JQuery;
    private _btOk: JQuery;
    private _btCancel: JQuery;

    constructor(data: TextFieldDialogInterface){

    }

    get title(){return this._title;}
    get inputs_prop(){return this._inputs_prop;}
    get id(){return this._id;}
    get width(){return this._width;}
    get height(){return this._height;}
    get dialog(){return this._dialog;}
    get btOk(){return this._btOk;}
    get btCancel(){return this._btCancel;}

}
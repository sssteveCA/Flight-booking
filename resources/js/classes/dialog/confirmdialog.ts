import ConfirmDialogInterface from "../../interfaces/dialog/confirmdialoginterface";

export default class ConfirmDialog{
    private _title: string;
    private _message: string;
    private _id: string;
    private _width: number|string;
    private _height: number|string;
    private _btYes: any;
    private _btNo: any;

    constructor(data: ConfirmDialogInterface){
        this._title = data.title;
        this._message = data.message;
        if(data.hasOwnProperty('id'))
            this._id = data.id as string;
        else this._id = 'dialog';
        if(data.hasOwnProperty('width'))
            this._width = data.width as number;
        else this._width = 'auto';
        if(data.hasOwnProperty('height'))
            this._height = data.height as number;
        else this._height = 'auto';
    }

    get title(){return this._title;}
    get message(){return this._message;}
    get id(){return this._id;}
    get width(){return this._width;}
    get height(){return this._height;}
    get btYes(){return this._btYes;}
    get btNo(){return this._btNo;}
}
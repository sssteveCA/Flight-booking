import MessageDialogInterface from "../../interfaces/dialog/messagedialog.interface";

export default class MessageDialog{
    private _title: string;
    private _message: string;
    private _id: string;
    private _width: number|string;
    private _height: number|string;
    private _dialog: JQuery;
    private _btOk: JQuery;

    constructor(data: MessageDialogInterface){
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
        this.setDialog();
    }

    get title(){return this._title;}
    get message(){return this._message;}
    get id(){return this._id;}
    get width(){return this._width;}
    get height(){return this._height;}
    get dialog(){return this._dialog;}
    get btOk(){return this._btOk;}

    private setDialog(): void{
        let message = this._message;
        this._dialog = $('<div>');
        this._dialog.attr('id',this._id);
        this._dialog.appendTo($('body'));
        this._dialog.dialog({
            closeOnEscape: false,
            draggable: false,
            height: this._height,
            modal: true,
            position: {my: "bottom center", at: "top", of: window},
            resizable: false,
            title: this._title,
            width: this._width,
            buttons: [{
                    text: 'OK',
                    click: function(){
                    }
                }
            ],
            close: function(){
            },
            open: function(){
                $(this).html(message);
            }
        });
        this._btOk = $('body > div.ui-dialog.ui-corner-all.ui-widget.ui-widget-content.ui-front.ui-dialog-buttons > div.ui-dialog-buttonpane.ui-widget-content.ui-helper-clearfix > div > button');
    }
}
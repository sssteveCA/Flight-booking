export interface TextFieldDialogInterface{
    title: string,
    inputs: InputProp[],
    id?: string,
    width?: number|string,
    height?: string|number
}

export interface InputProp {
    label_str: string; //description for input field
    input_id: string; //input id attribute
    input_name: string; //input name attribute
    input_type: string; //input type attribute
    input_value?: string; //input default value attribute(optional)
}
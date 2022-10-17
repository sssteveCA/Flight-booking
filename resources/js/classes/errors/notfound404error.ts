
export default class NotFound404Error extends Error{

    constructor(message: string){
        super(message);
        this.name = "NotFound404Error";
    }
}
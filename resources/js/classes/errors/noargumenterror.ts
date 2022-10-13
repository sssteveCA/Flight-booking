
/**
 * This error is thrown if a parameter expected from a request is not set or it's empty
 */
export default class NoArgumentError extends Error{

    constructor(message: string){
        super(message);
        this.name = "NoArgumentError";
    }
}
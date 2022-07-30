import editUsernameForm from "./info/editussername_function";
import {showPassword, editPasswordForm} from "./info/editpassword_function";
import deleteAccount from "./info/deleteaccount_function";

$(()=>{
    showPassword();
    editUsernameForm();
    editPasswordForm();
    deleteAccount();
});


import ConfirmDialogInterface from "../interfaces/dialog/confirmdialoginterface";
import MessageDialogInterface from "../interfaces/dialog/messagedialoginterface";
import ConfirmDialog from "../classes/dialog/confirmdialog";
import MessageDialog from "../classes/dialog/messagedialog";
import { Constants } from "../values/constants";
import EditUsername from "../classes/profile/editusername";
import EditUsernameInterface from "../interfaces/profile/editusername.interface";
import EditPasswordInterface from "../interfaces/profile/editpassword.interface";
import EditPassword from "../classes/profile/editpassword";
import EditUsernameForm from "./info/editussername_function";
import editUsernameForm from "./info/editussername_function";
import {showPassword, editPasswordForm} from "./info/editpassword_function";

$(()=>{
    showPassword();
    editUsernameForm();
    editPasswordForm();
});


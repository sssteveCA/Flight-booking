<?php


//This class contains only constants messages
interface Constants{
    //errors
    const ERR_NOTABLEGETUSERINFO = "Impossibile ottenere informazione sull'utente loggato";
    const ERR_PASSWORDINCORRECT = "La password attuale non è corretta";

    //success
    const OK_PASSWORDUPDATED = "La password è stata modificata";
    const OK_USERNAMEUPDATED = "Lo username è stato modificato";

    //titles
    const TITLE_EDITUSERNAME = "Modifica username";
    const TITLE_EDITPASSWORD = "Modifica password";
}
?>
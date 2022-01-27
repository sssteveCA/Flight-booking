<?php

//This class contains only constants messages
interface Constants{
    //errors
    const ERR_EMAILNOTFOUND = "Nessun account registrato con questa email";
    const ERR_INVALIDCREDENTIALS = "Le credenziali inserite non sono valide";
    const ERR_NOTABLEGETUSERINFO = "Impossibile ottenere informazione sull'utente loggato";
    const ERR_PASSWORDINCORRECT = "La password attuale non è corretta";
    const ERR_PASSWORDINCORRECTLOGIN = "La password inserita è errata";
    const ERR_URLNOTFOUND = "La pagina che hai richiesto non esiste";
    const ERR_VERIFYYOURACCOUNT = "Devi attivare il tuo account prima di accedere";

    //success
    const OK_PASSWORDUPDATED = "La password è stata modificata";
    const OK_REGISTRATION = "Registrazione completata. Accedi alla tua casella di posta, per attivare il tuo account";
    const OK_USERNAMEUPDATED = "Lo username è stato modificato";

    //titles
    const TITLE_EDITUSERNAME = "Modifica username";
    const TITLE_EDITPASSWORD = "Modifica password";
}
?>
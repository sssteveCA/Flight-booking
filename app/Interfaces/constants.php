<?php

namespace App\Interfaces;

//This class contains only constants messages
interface Constants{

    //email
    const EMAIL_ADMIN = "admin@localhost.lan";

    //errors
    const ADMIN_CONTACT = 'Se il problema persiste, contattare l\' amministratore del sito';
    const ERR_CARRENTAL_DELETE = "Errore durante la rimozione dell'auto selezionata. ".Constants::ADMIN_CONTACT;
    const ERR_CARRENTAL_PREVENTIVE = 'Errore durante il calcolo del preventivo per il noleggio auto. '.Constants::ADMIN_CONTACT;

    const ERR_CARRENTALPAYMENT_REFUSE = "Il pagamento dell'auto prenotata è stato rifiutato";
    const ERR_CARRENTALPAYMENT_UNKNOWN = "Errore durante il pagamento dell'auto. ".Constants::ADMIN_CONTACT;
    const ERR_EMAILSEND = 'Si è verificato un errore durante l\' invio della mail. '.Constants::ADMIN_CONTACT;
    const ERR_EMAILNOTFOUND = "Nessun account registrato con questa email";
    const ERR_FLIGHTBOOK_SINGLE = "Errore durante la prenotazione del volo. ".Constants::ADMIN_CONTACT;
    const ERR_FLIGHTBOOK_MULTIPLE = "Errore durante la prenotazione dei voli. ".Constants::ADMIN_CONTACT;
    const ERR_FLIGHT_DELETE = "Errore durante la rimozione del volo. ".Constants::ADMIN_CONTACT;
    CONST ERR_FLIGHT_EVENT_SINGLE = "Errore durante il caricamento dell'evento. ".Constants::ADMIN_CONTACT;
    const ERR_FLIGHT_EVENTS = 'Impossibile mostrare gli eventi. '.Constants::ADMIN_CONTACT;
    const ERR_FLIGHTPAYMENT_REFUSE = "Il pagamento del volo che hai prenotato è stato rifiutato";
    const ERR_FLIGHTPAYMENT_UNKNOWN = "Errore durante il pagamento del volo. ".Constants::ADMIN_CONTACT;
    const ERR_HOTELPAYMENT_REFUSE = "Il pagamento delle stanze d'albergo prenotate è stato rifiutato";
    const ERR_HOTELPAYMENT_UNKNOWN = "Errore durante il pagamento delle stanze d'albergo. ".Constants::ADMIN_CONTACT;
    const ERR_HOTEL_DELETE = "Errore durante la rimozione della prenotazione. ".Constants::ADMIN_CONTACT;
    const ERR_HOTEL_PREVENTIVE = "Errore durante il calcolo della prenotazione dell'albergo. ".Constants::ADMIN_CONTACT;
    const ERR_LOGIN = "Si è verificato un errore durante il login. ".Constants::ADMIN_CONTACT;
    const ERR_MISSEDDATA = "Uno o più dati richiesti sono mancanti. ".Constants::ADMIN_CONTACT;
    const ERR_MYCARS = "Errore durante la ricerca delle tue auto prenotate. ".Constants::ADMIN_CONTACT;
    const ERR_MYFLIGHTS = "Errore durante la ricerca dei tuoi voli prenotati. ".Constants::ADMIN_CONTACT;
    const ERR_MYHOTELS = "Errore durante la ricerca delle tue stanze prenotate. ".Constants::ADMIN_CONTACT;
    const ERR_VALUENOTOBTAINED = "Errore durante la lettura del valore";
    const ERR_INVALIDCREDENTIALS = "Le credenziali inserite non sono valide";
    const ERR_LOGOUT = "Si è verificato un errore durante la disconnessione dell'account. ".Constants::ADMIN_CONTACT;
    const ERR_NEWS = "Errore durante il caricamento delle notizie. ".Constants::ADMIN_CONTACT;
    const ERR_NEWS_SINGLE = "Errore durante il caricamento della notizia. ".Constants::ADMIN_CONTACT;
    const ERR_NOTABLEGETUSERINFO = "Impossibile ottenere informazione sull'utente loggato";
    const ERR_NOTAUTHENTICATED = "Devi essere autenticato per eseguire questa azione";
    const ERR_PASSWORDINCORRECT = "La password attuale non è corretta";
    const ERR_PASSWORDINCORRECTLOGIN = "La password inserita è errata";
    const ERR_PASSWORDUPDATE = "Errore durante la modifica della password. ".Constants::ADMIN_CONTACT;
    const ERR_PROFILE_DELETE = "Impossibile eliminare il tuo profilo. ".Constants::ADMIN_CONTACT;
    const ERR_PROFILE_INFO = "Impossibile mostrare le informazioni del tuo profilo. ".Constants::ADMIN_CONTACT;
    const ERR_REQUEST = "Errore durante l'esecuzione della richiesta. ".Constants::ADMIN_CONTACT;
    const ERR_REGISTRATION = 'Errore durante la registrazione. '.Constants::ADMIN_CONTACT;
    const ERR_URLNOTFOUND_NOTALLOWED = "La pagina che hai richiesto non esiste o non disponi delle autorizzazioni necessarie per effettuare questa operazione";
    const ERR_URLNOTFOUND_NOTALLOWED_API = "La risorsa che hai richiesto non esiste o non disponi delle autorizzazioni necessarie per effettuare questa operazione";
    const ERR_UNAUTHORIZED_REQUEST = "Non disponi delle autorizzazioni necessarie per effetuare questa richiesta";
    const ERR_USERNAMEUPDATE = "Errore durante la modifica del nome utente. ".Constants::ADMIN_CONTACT;
    const ERR_VERIFYYOURACCOUNT = "Devi attivare il tuo account prima di accedere";

    //common array keys
    const KEY_CODE = 'code';
    const KEY_DATA = 'data';
    const KEY_DONE = 'done';
    const KEY_EMPTY = 'empty';
    const KEY_ERRORS = 'errors';
    const KEY_MESSAGE = 'message';
    const KEY_MESSAGES = 'messages';
    const KEY_RESPONSE = 'response';
    const KEY_STATUS = 'status';

    //success
    const OK_ACCOUNTDELETED = "IL tuo account è stato eliminato definitivamente";
    const OK_CARRENTALDELETED = "L'auto noleggiata selezionata è stata rimossa";
    const OK_CARRENTALPAYMENT = "Il pagamento è stato completato. L'auto richiesta è stata prenotata";
    const OK_EMAILSEND = "La tua richiesta è stata inviata. Verrai ricontattato il prima possibile";
    const OK_FLIGHTBOOK_SINGLE = "Effettua il pagamento, per confermare la prenotazione del volo";
    const OK_FLIGHTBOOK_MULTIPLE = "Effettua il pagamento, per confermare la prenotazione dei voli.";
    const OK_FLIGHTDELETE = "Il volo selezionato è stato rimosso";
    const OK_FLIGHTPAYMENT = "Il pagamento è stato completato. I voli richiesti sono stati prenotati";
    const OK_HOTELDELETE = "La prenotazione selezionata è stata rimossa";
    const OK_HOTELCONFIRMPAYMENT = "Per confermare la prenotazione delle stanze d' albergo fai click su 'PAGA'";
    const OK_HOTELPAYMENT = "Il pagamento è stato completato. Le stanze d'albergo richieste sono state prenotate";
    const OK_PASSWORDUPDATED = "La password è stata modificata";
    const OK_REGISTRATION = "Registrazione completata. Accedi alla tua casella di posta, per attivare il tuo account";
    const OK_USERNAMEUPDATED = "Il nome utente è stato modificato";
    const OK_VERIFICATION_LINK_SENT = "Link di verifica email inviato";

    //titles
    const TITLE_EDITUSERNAME = "Modifica username";
    const TITLE_EDITPASSWORD = "Modifica password";

    //validation errors
    const VERR_CONFNEWPWD1_MIN = "La password di conferma deve contenere almeno 8 caratteri";
    const VERR_CONFNEWPWD1_REQUIRED = "La password di conferma è obbligatoria";
    const VERR_CONFNEWPWD1_SAME = "La password di conferma Deve essere uguale al campo nuova password";
    const VERR_NEWPWD1_MIN = "La nuova password deve contenere almeno 8 caratteri";
    const VERR_NEWPWD1_REQUIRED = "La nuova password è obbligatoria";
    const VERR_OLDPWD1_PASSWORD = "Password attuale errata";
    const VERR_OLDPWD1_REQUIRED = "La password attuale è obbligatoria";
    const VERR_USERNAME1_REQUIRED = "Lo username è obbligatorio";
    const VERR_USERNAME1_MIN = "Lo username deve avere almeno 5 caratteri";
    const VERR_USERNAME1_MAX = "Lo username non può avere più di 20 caratteri";

    //Other messages
    const MESS_BOOKED_FLIGHT_LIST_EMPTY = "Lista dei voli prenotati vuota";
    const MESS_BOOKED_HOTEL_LIST_EMPTY = "Lista delle stanze d'albergo prenotate vuota";
    const MESS_RENT_CARS_LIST_EMPTY = "Lista delle auto prese a noleggio vuota";
    const MESS_CARRENTAL_PAYMENT_CANCELED = "Pagamento non effettuato. L'auto richiesta non è stata prenotata";
    const MESS_FLIGHT_PAYMENT_CANCELED = "Pagamento non effettuato. I voli richiesti non sono stati prenotati";
    const MESS_HOTEL_PAYMENT_CANCELED = "Pagamento non effettuato. Le stanze d'albergo richieste non sono state prenotate";
    const MESS_NOPOSTS = "Nessuna notizia da mostrare";
}
?>
<?php

namespace App\Interfaces\Welcome;

use App\Interfaces\ExceptionsMessages;

interface FlightsTempManagerErrors extends ExceptionsMessages{

    //Numbers
    const NOTADDED = 1;
    const NOTDELETED = 2;
    const INVALIDREQUEST = 3;
    const NOTFOUND = 4;

    //Messages
    const NOTADDED_MSG = "Uno o più record di FlightTemp non sono stati aggiunti";
    const NOTDELETED_MSG = "Le righe della tabella con lo stesso id di sessione non sono state eliminate";
    const INVALIDREQUEST_MSG = "I dati inviati sono diversi da quelli della richiesta precedente";
    const NOTFOUND_MSG = "Non è stato trovato nessun record con l'id di sessione fornito";
}
?>
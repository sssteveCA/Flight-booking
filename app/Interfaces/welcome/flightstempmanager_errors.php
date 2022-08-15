<?php

namespace App\Interfaces\Welcome;

interface FlightsTempManagerErrors{
    //Exceptions
    const FLIGHTARRAY_EXC = "L' array che contiene i voli prenotati non è formattato correttamente";
    const SESSION_ID_EXC = "L'id di sessione non è stato trovato";

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
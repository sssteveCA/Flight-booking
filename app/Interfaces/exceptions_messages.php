<?php

namespace App\Interfaces;

/**
 * This interface contains all the exception string messages
 */
interface ExceptionsMessages{

    const FLIGHTARRAY_EXC = "L' array che contiene i voli prenotati non è formattato correttamente";
    const FLIGHTSDATAMODIFIED_EXC = "I dati del volo da inserire non corrispondono a quelli originalmente forniti";
    const HOTELREQUESTARRAY_EXC = "L' array che contiene i dati dell'albergo prenotato non è formattato correttamente";
    const INVALIDDATA_EXC = "Uno o più dati passati alla classe FlightPrice non sono validi";
    const SESSION_ID_EXC = "L'id di sessione non è stato trovato";

}
?>
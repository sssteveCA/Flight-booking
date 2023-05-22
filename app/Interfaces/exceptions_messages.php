<?php

namespace App\Interfaces;

/**
 * This interface contains all the exception string messages
 */
interface ExceptionsMessages{

    const CARRENTALDATAMODIFIED_EXC = "I dati delLa prenotazione dell'auto non corrispondono a quelli originalmente forniti";

    const CARRENTAL_NEWROW_EXC = "Errore durante l'inserimento di una nuova riga nella tabella carrentals";
    const CARRENTALT_NEWROW_EXC = "Errore durante l'inserimento di una nuova riga nella tabella carrentaltemp";

    const FLIGHTARRAY_EXC = "L' array che contiene i voli prenotati non è formattato correttamente";
    const FLIGHTSDATAMODIFIED_EXC = "I dati del volo da inserire non corrispondono a quelli originalmente forniti";
    const HOTELDATAMODIFIED_EXC = "I dati delLa prenotazione della stanza d'albergo non corrispondono a quelli originalmente forniti";
    const HOTEL_NEWROW_EXC = "Errore durante l'inserimento di una nuova riga nella tabella hotels";
    const HOTELPT_NEWROW_EXC = "Errore durante l'inserimento di una nuova riga nella tabella hotelpricetemp";
    const HOTELREQUESTARRAY_EXC = "L' array che contiene i dati dell'albergo prenotato non è formattato correttamente";
    const INVALIDDATA_EXC = "Uno o più dati passati alla classe FlightPrice non sono validi";
    const SESSION_ID_EXC = "L'id di sessione non è stato trovato";

}
?>
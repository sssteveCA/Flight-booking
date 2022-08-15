<?php

namespace App\Interfaces\Welcome;

interface FlightsTempManagerErrors{
    //Exceptions
    const FLIGHTARRAY_EXC = "L' array che contiene i voli prenotati non è formattato correttamente";

    //Numbers
    const NOTADDED = 1;
    const NOTDELETED = 2;

    //Messages
    const NOTADDED_MSG = "Uno o più record di FlightTemp non sono stati aggiunti";
    const NOTDELETED_MSG = "Le righe della tabella con lo stesso id di sessione non sono state eliminate";
}
?>
<?php

namespace App\Interfaces\Welcome;

use App\Interfaces\ExceptionsMessages;

interface HotelPriceErrors extends ExceptionsMessages{
    const HOTELINFO_NOTFOUND = 1;
    const TOOMANYPEOPLE_FOR_ROOMS = 2; 

    const HOTELINFO_NOTFOUND_MSG = "L'hotel richiesto non è stato trovato";
    const TOOMANYPEOPLE_FOR_ROOMS_MSG = "Ci sono troppe persone rispetto alle stanze prenotate";
}
?>
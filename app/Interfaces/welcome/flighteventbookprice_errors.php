<?php

namespace App\Interfaces\Welcome;

use App\Interfaces\ExceptionsMessages;

interface FlightEventBookPriceErrors extends ExceptionsMessages{
    const FLIGHTEVENT_NOTFOUND = 1;

    const FLIGHTEVENT_NOTFOUND_MSG ="L'evento specificato non esiste";
}

?>
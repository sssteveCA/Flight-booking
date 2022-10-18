<?php

namespace App\Interfaces\Welcome;

use App\Interfaces\ExceptionsMessages;

interface FlightPriceErrors extends ExceptionsMessages{

    const DATEFORMAT = 1;

    const DATEFORMAT_MSG = "Errore durante la formattazione della data";
}
?>
<?php

namespace App\Interfaces\Welcome;

interface FlightPriceErrors{

    const INVALIDDATA_EXC = "Uno o più dati passati alla classe FlightPrice non sono validi";

    const DATEFORMAT = 1;

    const DATEFORMAT_MSG = "Errore durante la formattazione della data";
}
?>
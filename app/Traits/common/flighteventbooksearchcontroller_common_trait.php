<?php

namespace App\Traits\Common;

use App\Classes\Welcome\FlightEventBookPrice;
use App\Classes\FlightEventBookTempManager;
use App\Interfaces\Constants as C;
use App\Models\FlightEvent;

/**
 * Trait used by FlightEventBookSearchController web and api classes
 */
trait FlightEventBookSearchControllerCommonTrait{

    /**
     * Get info of the selected flight event before book confirmation
     * @param array $inputs
     * @return array
     */
    private function getFlightEventBookPriceInfo(array $inputs): array{
        $flightEventBookPrice = new FlightEventBookPrice([
            'event_id' => $inputs['event_id'],
            'tickets' => $inputs['tickets']
        ]);
        $flightEventBookTempData = [
            'event_id' => $flightEventBookPrice->getEventId(),
            'tickets' => $flightEventBookPrice->getTickets(),
            'price' => $flightEventBookPrice->getPrice()
        ];
        $febtm = new FlightEventBookTempManager($flightEventBookTempData);
        $febtm->addFlightEventBookTemp();
        $flightEventBook = FlightEvent::find($flightEventBookTempData['event_id']);
        return [
            C::KEY_DONE => true,
            C::KEY_RESPONSE => [
                'flighteventbook' => [
                    'event_id' => $flightEventBook->id,
                    'name' => $flightEventBook->name,
                    'country' => $flightEventBook->country,
                    'city' => $flightEventBook->city,
                    'location' => $flightEventBook->location,
                    'gmLink' => $flightEventBook->gmLink,
                    'date' => $flightEventBook->date,
                    'image' => $flightEventBook->image,
                    'tickets' => $flightEventBookTempData['tickets'],
                    'price' => sprintf("%.2f",$flightEventBookTempData['price'])
                ]
            ]
        ];
    }
}

?>
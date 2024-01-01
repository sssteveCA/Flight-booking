<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightEvent>
 */
class FlightEventFactory extends Factory
{
    use FlightEventFactoryTrait;

    private array $flightEventsData;

    public function __construct(){
        $this->flightEventsData = $this->getFilledFlightEvents(FlightEvents::FLIGHTEVENTS_LIST);
    }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            //
        ];
    }
}

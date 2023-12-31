<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Interfaces\Airports;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Flight>
 */
class FlightFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $countriesList = array_keys(Airports::AIRPORTS_LIST);
        $departureCountry =  $this->faker->randomElement($countriesList);
        $departureAirportsList = array_keys(Airports::AIRPORTS_LIST[$departureCountry]);
        $departureAirport = $this->faker->randomElement($departureAirportsList);
        $arrivalCountry = $this->faker->randomElement($countriesList);
        $arrivalAirportsList = array_keys(Airports::AIRPORTS_LIST[$arrivalCountry]);
        while(!isset($arrivalAirport) || ($departureCountry == $arrivalCountry && $arrivalAirport == $departureAirport)){
            $arrivalAirport = $this->faker->randomElement($arrivalAirportsList);
        }
        $flightDate = Carbon::tomorrow();

        return [
            'user_id' => User::factory(),
            'company_name' => $this->faker->randomElement(Airports::COMPANIES_LIST),
            'departure_country' => $departureCountry,
            'departure_airport' => $departureAirport,
            'arrival_country' => $arrivalCountry,
            'arrival_airport' => $arrivalAirport,
            'adults' => $this->faker->randomElement(range(1,5)),
            'teenagers' => $this->faker->randomElement(range(1,5)),
            'children' => $this->faker->randomElement(range(1,5)),
            'newborns' => $this->faker->randomElement(range(1,5)),
            'flight_date' => $flightDate->format('Y-m-d'),
            'flight_time' => $this->faker->time(),
            'flight_price' => $this->faker->randomFloat(2,50,500),
            'payed' => $this->faker->randomElement([0, 1]),
            'transaction_id' => $this->faker->uuid,
        ];
    }
}

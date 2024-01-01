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
        $usersId = User::take(50)->pluck('id');
        $countriesList = array_keys(Airports::AIRPORTS_LIST);
        $departureCountry =  $this->faker->randomElement($countriesList);
        $departureAirportsList = array_keys(Airports::AIRPORTS_LIST[$departureCountry]);
        $departureAirport = $this->faker->randomElement($departureAirportsList);
        $arrivalCountry = $this->faker->randomElement($countriesList);
        $arrivalAirportsList = array_keys(Airports::AIRPORTS_LIST[$arrivalCountry]);
        while(!isset($arrivalAirport) || ($departureCountry == $arrivalCountry && $arrivalAirport == $departureAirport)){
            $arrivalAirport = $this->faker->randomElement($arrivalAirportsList);
        }
        $currentDate = Carbon::tomorrow();
        $bookingDate = $this->faker->dateTimeBetween($currentDate, $currentDate->copy()->addDays(30))->format('Y-m-d');
        $flightDate = $this->faker->dateTimeBetween($bookingDate . ' +1 days', $bookingDate . ' +30 days')->format('Y-m-d');
        $payed = $this->faker->randomElement([0, 1]);
        $payedDate = $payed ? $bookingDate : null;
        $transactionId = $payed ? $this->faker->uuid : null;

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
            'booking_date' => $bookingDate,
            'flight_date' => $flightDate,
            'flight_time' => $this->faker->time(),
            'flight_price' => $this->faker->randomFloat(2,50,500),
            'payed' => $payed,
            'payed_date' => $payedDate,
            'transaction_id' => $transactionId
        ];
    }
}

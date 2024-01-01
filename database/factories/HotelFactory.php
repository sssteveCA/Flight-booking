<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use App\Models\User;
use App\Interfaces\Hotels;
use DateTime;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $countriesList = array_keys(Hotels::HOTELS_LIST);
        $country =  $this->faker->randomElement($countriesList);
        $citiesList = array_keys(Hotels::HOTELS_LIST[$country]);
        $city = $this->faker->randomElement($citiesList);
        $hotelsList = array_keys(Hotels::HOTELS_LIST[$country][$city]);
        $hotel = $this->faker->randomElement($hotelsList);
        $currentDate = Carbon::tomorrow();
        $bookingDate = $this->faker->dateTimeBetween($currentDate, $currentDate->copy()->addDays(30))->format('Y-m-d');
        $checkinDate = $this->faker->dateTimeBetween($bookingDate . ' +1 days', $bookingDate . ' +30 days')->format('Y-m-d');
        $checkinDateDt = new DateTime($checkinDate);
        $checkoutDate = $this->faker->dateTimeBetween($checkinDate . ' +1 days',$checkinDate . ' +30 days')->format('Y-m-d');
        $checkoutDateDt = new DateTime($checkoutDate);
        $rooms = $this->faker->numberBetween(1, 5);
        $people = $this->faker->numberBetween($rooms, $rooms * 2);
        $pricePerNight = $this->faker->randomFloat(2,50,500);
        $numberOfNights = $checkinDateDt->diff($checkoutDateDt)->days;
        $totalPrice = $pricePerNight * $numberOfNights;
        $payed = $this->faker->randomElement([0, 1]);
        $payedDate = $payed ? $bookingDate : null;
        $transactionId = $payed ? $this->faker->uuid : null;

        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'country' => $country,
            'city' => $city,
            'hotel' => $hotel,
            'booking_date' => $bookingDate,
            'checkin' => $checkinDate,
            'checkout' => $checkoutDate,
            'rooms' => $rooms,
            'people' => $people,
            'price' => $totalPrice,
            'payed' => $payed,
            'payed_date' => $payedDate,
            'transaction_id' => $transactionId,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\api\welcome\CarRentalSearchControllerApi;
use App\Interfaces\CarRental;
use Carbon\Carbon;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarRental>
 */
class CarRentalFactory extends Factory
{ 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $currentDate = Carbon::now();
        $carNames = array_keys(CarRental::CAR_FLEET);
        $companyNames = array_keys(CarRental::CARRENTAL_COMPANIES);
        $ageRanges = $this->getAgeRangeStrings(CarRental::AGE_RANGES);
        $startDate = Carbon::tomorrow(); // Data a partire da domani
        $endDate = Carbon::tomorrow()->addDay(); // Data a partire da un giorno dopo $startDate
        $payedDate = $startDate->copy()->addMinute()->addSeconds(rand(1, 59));
        $payed = $this->faker->randomElement([0, 1]);
        $payedDate = $payed ? $currentDate->format('Y-m-d') : null;
        $transactionId = $payed ? $this->faker->uuid : null;
        return [
            'user_id' => User::factory(),
            'car_name' => $this->faker->randomElement($carNames),
            'company_name' => $this->faker->randomElement($companyNames),
            'age_range' => $this->faker->randomElement($ageRanges),
            'rentstart_date' => $startDate,
            'rentend_date' => $endDate,
            'price' => $this->faker->randomFloat(2, 50, 200),
            'payed' => $payed,
            'payed_date' => $payedDate,
            'transaction_id' => $transactionId
        ];
    }

    /**
     * Create list of age ranges in string format
     * @param array $ageRangeData the array with age range num items
     * @return array 
     */
    private function getAgeRangeStrings(array $ageRangeData): array{
        $ageRangeStrings = array_map(function($item){
            return "{$item[0]}-{$item[1]}";
        },$ageRangeData);
        return $ageRangeStrings;
    }



}

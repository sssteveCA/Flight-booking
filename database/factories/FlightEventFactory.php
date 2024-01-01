<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Traits\FlightEventFactoryTrait;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FlightEvent>
 */
class FlightEventFactory extends Factory
{
    use FlightEventFactoryTrait;
    
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

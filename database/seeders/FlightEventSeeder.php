<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Traits\FlightEventSeederTrait;
use App\Interface\FlightEvents;
use Carbon\Carbon;
use App\Models\FlightEvent;

class FlightEventSeeder extends Seeder
{
    use FlightEventSeederTrait;

    private array $flightEventsData;

    public function __construct(){
        $this->flightEventsData = $this->getFilledFlightEvents(FlightEvents::FLIGHTEVENTS_LIST);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->flightEventsData;
        array_walk($data,function(&$event){
            $randomDate = Carbon::tomorrow()->addDays(rand(1, 180))->toDateString();
            $event['date'] = $randomDate;
            FlightEvent::create($event);
        });
    }
}

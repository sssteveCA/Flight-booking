<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlighttempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flighttemp', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->index('user_id');
            $table->string('flight_type',15);
            $table->string('flight_direction',15);
            $table->string('company_name',35);
            $table->string('departure_country',30);
            $table->string('departure_airport',30);
            $table->string('arrival_country',30);
            $table->string('arrival_airport',30);
            $table->date('booking_date');
            $table->date('flight_date');
            $table->time('flight_time');
            $table->integer('adults');
            $table->integer('teenagers');
            $table->integer('children');
            $table->integer('newborns');
            $table->decimal('flight_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flighttemp');
    }
}

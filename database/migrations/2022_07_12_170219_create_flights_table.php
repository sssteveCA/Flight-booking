<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flights', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('company_name',50);
            $table->string('departure_country', 30);
            $table->string('departure_airport');
            $table->string('arrival_country', 30);
            $table->string('arrival_airport');
            $table->date('booking_date');
            $table->date('flight_date');
            $table->decimal('price');
            //$table->timestamps();

            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flights');
    }
}

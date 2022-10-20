<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelPriceTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotelpricetemp', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('session_id')->unique('session_id_unique');
            $table->string('country',30);
            $table->string('city',30);
            $table->string('hotel',50);
            $table->date('checkin');
            $table->date('checkout');
            $table->unsignedInteger('rooms');
            $table->unsignedInteger('people');
            $table->unsignedDecimal('price',10,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotel_price_temp');
    }
}

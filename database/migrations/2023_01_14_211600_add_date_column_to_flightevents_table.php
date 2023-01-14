<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateColumnToFlighteventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flightevents', function (Blueprint $table) {
            $table->string('gmLink',100)->after('location');
            $table->string('city')->after('country');
            $table->dateTime('date')->after('price');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flightevents', function (Blueprint $table) {
            $table->dropColumn(['gmLink','date']);
        });
    }
}

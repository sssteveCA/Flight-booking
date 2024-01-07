<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flighteventsbooktemp', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->unsignedBigInteger('event_id');
            $table->string('session_id')->unique('session_id_unique');
            $table->unsignedTinyInteger('tickets');
            $table->unsignedDecimal('price',10,2);
            $table->foreign('event_id')
                ->references('id')
                ->on('flightevents')
                ->onUpdate('restrict')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('flighteventsbooktemp');
    }
};

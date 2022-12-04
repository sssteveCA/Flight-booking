<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->engine = 'InnoDB';
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('country',40);
            $table->string('city',50);
            $table->string('hotel',60);
            $table->date('booking_date');
            $table->date('checkin');
            $table->date('checkout');
            $table->smallInteger('rooms');
            $table->tinyInteger('people');
            $table->decimal('price');
            $table->boolean('payed')->default(0);
            $table->dateTime('payed_date')->nullable();
            $table->string('transaction_id')->nullable();
            //$table->timestamps();

            $table->index('user_id');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
}

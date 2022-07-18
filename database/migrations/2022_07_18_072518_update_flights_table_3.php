<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateFlightsTable3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('flights',function(Blueprint $table){
            $table->integer('adults')->default(0)->after('arrival_airport');
            $table->integer('teenagers')->default(0)->after('adults');
            $table->integer('children')->default(0)->after('teenagers');
            $table->integer('newborns')->default(0)->after('children');
            $table->boolean('payed')->default(0);
            $table->dateTime('payed_date')->nullable();
            $table->string('transaction_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('flights', function(Blueprint $table){
            /* $table->dropColumn('adults');
            $table->dropColumn('teenagers');
            $table->dropColumn('children');
            $table->dropColumn('newborns');
            $table->dropColumn('payed');
            $table->dropColumn('payed_date');
            $table->dropColumn('transaction_id'); */
        });
    }
}

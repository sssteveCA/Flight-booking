<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarRentalPriceTempTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrentaltemp', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->string('session_id')->unique('session_id_unique');
            $table->string('car_name',30);
            $table->string('company_name',30);
            $table->enum('age_range',['19-20','21-24','25-29','30-65'.'66-75','76-90']);
            $table->date('rentstart_date');
            $table->date('rentend_date');
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
        Schema::dropIfExists('carrentalpricetemp');
    }
}

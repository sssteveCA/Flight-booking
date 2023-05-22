<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarrentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrentals', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_general_ci';
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('car_name',30);
            $table->string('company_name',30);
            $table->enum('age_range',['19-20','21-24','25-29','30-65','66-75','76-90']);
            $table->date('rentstart_date');
            $table->date('rentend_date');
            $table->unsignedDecimal('price',10,2);
            $table->boolean('payed')->default(0);
            $table->dateTime('payed_date')->nullable();
            $table->string('transaction_id')->nullable();

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
        Schema::dropIfExists('carrentals');
    }
}

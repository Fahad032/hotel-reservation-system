<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('rates', function( Blueprint $table ){

            $table->increments('id');

            $table->integer('room_id')->unsigned();
            
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->decimal('rate');

            $table->integer('currency_id')->unsigned();

            $table->foreign('currency_id')->references('id')->on('currencies')->onDelete('cascade');
            
            $table->date('date_start');
            
            $table->date('date_end');

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
        Schema::drop('rates');
    }
}

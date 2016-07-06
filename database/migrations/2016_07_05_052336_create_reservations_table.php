<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function( Blueprint $table ){

            $table->increments('id');

            $table->string('reservation_number');

            $table->date('date_start');

            $table->date('date_end');

            $table->integer('user_id')->unsigned();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');

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
        //
        Schema::drop('reservations');
    }
}

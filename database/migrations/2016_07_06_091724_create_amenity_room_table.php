<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenityRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_room', function( Blueprint $table){

            $table->increments('id');

            $table->integer('amenity_id')->unsigned();

            $table->foreign('amenity_id')->references('id')->on('amenities')->onDelete('cascade');

            $table->integer('room_id')->unsigned();

            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');

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

        Schema::drop('amenity_room');

    }
}

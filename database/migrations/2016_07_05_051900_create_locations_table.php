<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function( Blueprint $table ){

            $table->increments('id');

            $table->decimal('latitude', 9, 6);

            $table->decimal('longitude', 9, 6);

            $table->string('address_1');

            $table->string('address_2');

            $table->integer('city_id')->unsigned();

            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

            $table->integer('state_id')->unsigned();

            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');

            $table->integer('country_id')->unsigned();

            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');

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
        Schema::drop('locations');
        //
    }
}

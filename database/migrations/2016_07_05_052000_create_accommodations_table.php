<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodations', function( Blueprint $table ){
           
            $table->increments('id');
            
            $table->string('name');
            
            $table->text('description');
            
            $table->integer('location_id')->unsigned();

            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

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
        Schema::drop('accommodations');
    }
}

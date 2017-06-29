<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('vehicle_driver_id')->nullable()->unsigned();
            $table->foreign('vehicle_driver_id')
                ->references('id')
                ->on('vehicle_drivers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('departure_state_id')->unsigned();
            $table->foreign('departure_state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');
            $table->string('departureDate');
            $table->integer('arrival_state_id')->unsigned();
            $table->foreign('arrival_state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');
            $table->integer('trip_price');
            $table->string('has_been_made')->default('false');
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
        Schema::dropIfExists('Trips');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('Bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade');
            $table->integer('from_state_id')->unsigned();
            $table->foreign('from_state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');
            $table->integer('pickUpCity_id')->unsigned();
            $table->foreign('pickUpCity_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade');
            $table->integer('no_of_passengers');
            $table->integer('pickUp_bus_stop_id')->unsigned();
            $table->foreign('pickUp_bus_stop_id')
                ->references('id')
                ->on('bus_stops')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('pickUpDate');
            $table->integer('to_state_id')->unsigned();
            $table->foreign('to_state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade');
            $table->integer('destinationCity_id')->unsigned();
            $table->foreign('destinationCity_id')
                ->references('id')
                ->on('cities')
                ->onUpdate('cascade');
            $table->integer('DropOff_bus_stop_id')->unsigned();
            $table->foreign('DropOff_bus_stop_id')
                ->references('id')
                ->on('bus_stops')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('mobileNo');
            $table->string('status')->default('Not Approved');
            $table->string('price')->nullable();
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
        Schema::dropIfExists('Bookings');    
    }
}

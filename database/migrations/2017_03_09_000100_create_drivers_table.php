<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('address');
            $table->string('years_of_experience');
            $table->integer('state_id')->unsigned();
            $table->foreign('state_id')
                ->references('id')
                ->on('states')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('age_group_id')->unsigned();
            $table->foreign('age_group_id')
                ->references('id')
                ->on('age_groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('phone_no');
            $table->string('is_invited')->default('false');
            $table->string('is_active')->default('false');
            $table->string('is_assigned_vehicle')->default('false');
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
        Schema::dropIfExists('drivers');
    }
}

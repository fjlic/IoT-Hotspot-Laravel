<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->string('num_serie')->unique()->nullable();
            $table->string('passw')->nullable();
            $table->string('vol_1')->nullable();
            $table->string('vol_2')->nullable();
            $table->string('vol_3')->nullable();
            $table->string('door_1')->nullable();
            $table->string('door_2')->nullable();
            $table->string('door_3')->nullable();
            $table->string('door_4')->nullable();
            $table->string('rlay_1')->nullable();
            $table->string('rlay_2')->nullable();
            $table->string('rlay_3')->nullable();
            $table->string('rlay_4')->nullable();
            $table->string('text')->nullable();
            $table->foreign('sensor_id')->references('id')->on('sensors')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('historial_sensors');
    }
}

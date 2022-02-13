<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticalSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistical_sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sensor_id')->nullable();
            $table->string('elements')->nullable();
            $table->string('aver_temper_glob')->nullable();
            $table->string('difer_const')->nullable();
            $table->json('sample')->nullable();
            $table->string('start_time')->nullable();
            $table->string('pass_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->integer('stat')->default('0');
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
        Schema::dropIfExists('statistical_sensors');
    }
}

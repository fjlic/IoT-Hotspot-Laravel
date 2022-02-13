<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statistical_sensor_id')->nullable();
            $table->string('aver_temper_glob')->nullable();
            $table->string('difer_const')->nullable();
            $table->string('elements')->nullable();
            $table->json('sample')->nullable();
            $table->string('start_time')->nullable();
            $table->string('pass_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->foreign('statistical_sensor_id')->references('id')->on('statistical_sensors')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('learning_sensors');
    }
}

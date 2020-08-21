<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erb_id')->default(0)->nullable();
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
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('sensors');
    }
}

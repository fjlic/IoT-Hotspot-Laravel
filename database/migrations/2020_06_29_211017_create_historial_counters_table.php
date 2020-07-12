<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counter_id')->nullable();
            $table->string('serie_nfc')->unique()->nullable();
            $table->bigInteger('count_global')->nullable();
            $table->bigInteger('count_between_cuts')->nullable();
            $table->string('time_global_between_cuts')->nullable();
            $table->string('time_between_cuts')->nullable();
            $table->bigInteger('prizes_count')->nullable();
            $table->timestamps();
            $table->foreign('counter_id')->references('id')->on('counters')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_counters');
    }
}

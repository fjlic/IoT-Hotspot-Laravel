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
            $table->string('num_serie')->nullable();
            $table->string('cont_qr')->nullable();
            $table->string('cont_mon')->nullable();
            $table->timestamps();
            $table->foreign('counter_id')->references('id')->on('counters')->onUpdate('cascade')->onDelete('cascade')->default(0)->nullable();
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticalCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistical_counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('counter_id')->nullable();
            $table->string('elements')->nullable();
            $table->string('start_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->string('total_time')->nullable();
            $table->string('difer_time')->nullable();
            $table->json('sample')->nullable();
            $table->integer('stat')->default('0');
            $table->foreign('counter_id')->references('id')->on('counters')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('statistical_counters');
    }
}

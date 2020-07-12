<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('crd_id')->nullable();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->unsignedBigInteger('nfc_id')->nullable();
            $table->unsignedBigInteger('qr_id')->nullable();
            $table->string('type_pcb')->nullable();
            $table->string('serie_nfc')->unique()->nullable();
            $table->bigInteger('count_global')->nullable();
            $table->bigInteger('count_between_cuts')->nullable();
            $table->string('time_global_between_cuts')->nullable();
            $table->string('time_between_cuts')->nullable();
            $table->bigInteger('prizes_count')->nullable();
            $table->timestamps();
            $table->foreign('crd_id')->references('id')->on('crds')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('qr_id')->references('id')->on('qrs')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->foreign('nfc_id')->references('id')->on('nfcs')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}

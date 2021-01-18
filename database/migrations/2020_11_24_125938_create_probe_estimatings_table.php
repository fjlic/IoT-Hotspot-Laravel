<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProbeEstimatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('probe_estimatings', function (Blueprint $table) {
            $table->id();
            $table->string('prox_size')->nullable();
            $table->string('mod_size')->nullable();
            $table->string('stm_prox_size')->nullable();
            $table->string('act_prox_size')->nullable();
            $table->string('act_dev_size')->nullable();
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
        Schema::dropIfExists('probe_estimatings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialNfcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_nfcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nfc_id')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('cont_qr')->nullable();
            $table->string('cont_mon')->nullable();
            $table->string('cont_mon_2')->nullable();
            $table->string('cont_corte')->nullable();
            $table->string('cont_prem')->nullable();
            $table->string('cost_mon')->nullable();
            $table->string('ssid')->nullable();
            $table->string('passwd')->nullable();
            $table->string('ip_server')->nullable();
            $table->string('port')->nullable();
            $table->string('txt')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('historial_nfcs');
    }
}

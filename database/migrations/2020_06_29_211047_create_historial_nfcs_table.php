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
            $table->string('name_machine');
            $table->string('nick_name');
            $table->string('num_serie')->nullable();
            $table->bigInteger('count_global')->nullable();
            $table->bigInteger('count_between_cuts')->nullable();
            $table->string('time_global_between_cuts');
            $table->string('time_between_cuts');
            $table->bigInteger('prizes_count')->nullable();
            $table->string('ssid')->nullable();
            $table->string('password')->default('nfc123');
            $table->string('ip_server')->nullable();
            $table->string('port')->nullable();
            $table->string('protocol')->nullable();
            $table->string('text')->nullable();
            $table->string('uploaded')->default('0');
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

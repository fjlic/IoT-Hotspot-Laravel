<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialErbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_erbs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('name_machine');
            $table->string('nick_name');
            $table->string('password')->default('esp123');
            $table->string('api_token');
            $table->timestamps();
            $table->foreign('erb_id')->references('id')->on('erbs')->onUpdate('cascade')->onDelete('cascade')->default(0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_erbs');
    }
}

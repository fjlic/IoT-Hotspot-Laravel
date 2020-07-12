<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialCrdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_crds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('erb_id')->nullable();
            $table->string('num_serie')->nullable();
            $table->string('name_machine');
            $table->string('nick_name');
            $table->string('password')->default('crd123');
            $table->string('api_token');
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
        Schema::dropIfExists('historial_crds');
    }
}

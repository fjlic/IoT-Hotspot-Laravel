<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialQrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_qrs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qr_id')->nullable();
            $table->string('qr_serie');
            $table->string('coins');
            $table->string('uploaded')->default('0');
            $table->timestamps();
            $table->foreign('qr_id')->references('id')->on('qrs')->onUpdate('cascade')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_qrs');
    }
}

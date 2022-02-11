<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('learning_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('statistical_request_id')->nullable();
            $table->string('elements')->nullable();
            $table->string('start_time')->nullable();
            $table->string('finish_time')->nullable();
            $table->string('total_time')->nullable();
            $table->string('difer_time')->nullable();
            $table->json('sample')->nullable();
            $table->foreign('statistical_request_id')->references('id')->on('statistical_requests')->onUpdate('cascade')->onDelete('cascade')->nullable();
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
        Schema::dropIfExists('learning_requests');
    }
}

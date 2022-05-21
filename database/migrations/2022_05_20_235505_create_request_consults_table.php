<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_consults', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('patient_id')->unsigned();
            $table->bigInteger('doctor_id')->unsigned();
            $table->text('comments');
            $table->text('duration');
            $table->foreign('patient_id')->references('id')->on('users')->references('id')->on('users')
            ->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('users')->references('id')->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('request_consults');
    }
};
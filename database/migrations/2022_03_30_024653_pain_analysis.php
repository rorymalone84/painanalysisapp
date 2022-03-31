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
        Schema::create('pain_analyses', function (Blueprint $table) {
            $table->id();
            $table->json('question_1');
            $table->json('question_2');
            $table->integer('question_3');
            $table->integer('question_4');
            $table->integer('question_5');
            $table->string('question_6');
            $table->json('question_7');
            $table->integer('question_8');
            $table->integer('question_9');
            $table->integer('question_10');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('pain_analysis_posts');
    }
};
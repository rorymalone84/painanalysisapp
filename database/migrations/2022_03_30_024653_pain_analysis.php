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
            $table->timestamp('date')->nullable();
            $table->json('question_1');
            $table->json('question_2');
            $table->json('question_3');
            $table->json('question_4');
            $table->integer('question_5');
            $table->integer('question_6');
            $table->integer('question_7');
            $table->integer('question_8');
            $table->json('question_9');
            $table->integer('question_10');
            $table->integer('question_11');
            $table->integer('question_12');
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->references('id')->on('users')
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
        Schema::dropIfExists('pain_analysis_posts');
    }
};
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuizAnswerStatistics extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('quiz_answer_statistics')) {
            Schema::create('quiz_answer_statistics', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('quiz_number');
                $table->integer('question_id');
                $table->boolean('right_answer');
                $table->timestamps();

                $table->foreign('question_id')->references('id')->on('questions');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('quiz_answer_statistics', function (Blueprint $table) {
            $table->dropForeign(['question_id']);
            $table->dropColumn('question_id');
        });
        Schema::dropIfExists('quiz_answer_statistics');

    }
}

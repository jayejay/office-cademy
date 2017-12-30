<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('questions')) {
            Schema::create('questions', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('question_translations')){
            Schema::create('question_translations', function (Blueprint $table){
                $table->increments('id');
                $table->integer('question_id')->unsigned();
                $table->string('title');
                $table->integer('answer');
                $table->json('options');
                $table->string('locale')->index();

                $table->unique(['question_id', 'locale']);
                $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');

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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('question_translations');
        Schema::dropIfExists('questions');
    }
}

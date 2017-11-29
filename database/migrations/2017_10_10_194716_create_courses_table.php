<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('courses')) {
            Schema::create('courses', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('course_translations')){
            Schema::create('course_translations', function (Blueprint $table){
                $table->increments('id');
                $table->integer('course_id')->unsigned();
                $table->string('name');
                $table->string('locale')->index();

                $table->unique(['course_id', 'locale']);
                $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

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
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('course_translations');
        Schema::dropIfExists('courses');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}

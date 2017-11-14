<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexCourseIdChapterIdToPosts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('posts', function (Blueprint $table) {
//            $table->unique(['chapter_id', 'course_id']);
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('posts', function (Blueprint $table) {
//            $table->dropForeign('posts_course_id_foreign');
//            $table->dropForeign('posts_chapter_id_foreign');
//            $table->dropUnique(['chapter_id', 'course_id']);
//        });
    }
}

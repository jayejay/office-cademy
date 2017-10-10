<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('chapter');
            $table->timestamps();
        });
        //Todo: Foreign key is not created
        Schema::table('posts', function (Blueprint $table) {
            $table->integer('chapter_id')->unsigned();
            $table->foreign('chapter_id')->references('id')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table('posts', function (Blueprint $table) {
//            $table->dropForeign('chapter_id');
//            $table->dropColumn('chapter_id');
//        });
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('chapters');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
      }
}

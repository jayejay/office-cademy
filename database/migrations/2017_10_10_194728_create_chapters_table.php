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
        if (!Schema::hasTable('chapters')) {
            Schema::create('chapters', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('chapter_translations')){
            Schema::create('chapter_translations', function (Blueprint $table){
                $table->increments('id');
                $table->integer('chapter_id')->unsigned();
                $table->string('name');
                $table->string('locale')->index();

                $table->unique(['chapter_id', 'locale']);
                $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');

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
        Schema::dropIfExists('chapter_translations');
        Schema::dropIfExists('chapters');
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
      }
}

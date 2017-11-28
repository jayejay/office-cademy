<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('tags')){
            Schema::create('tags', function (Blueprint $table) {
                $table->increments('id');
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('tag_translations')){
            Schema::create('tag_translations', function (Blueprint $table){
                $table->increments('id');
                $table->integer('tag_id')->unsigned();
                $table->string('name');
                $table->string('locale')->index();

                $table->unique(['tag_id', 'locale']);
                $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

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
        Schema::dropIfExists('tag_translations');
        Schema::dropIfExists('tags');
    }
}

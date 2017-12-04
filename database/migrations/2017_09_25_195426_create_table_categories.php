<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('categories')) {

            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
            });

            if(!Schema::hasTable('category_translations')){
                Schema::create('category_translations', function (Blueprint $table){
                    $table->increments('id');
                    $table->integer('category_id')->unsigned();
                    $table->string('name');
                    $table->string('locale')->index();

                    $table->unique(['category_id', 'locale']);
                    $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');

                });
            }

            Schema::table('posts', function (Blueprint $table) {
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
        Schema::dropIfExists('category_translations');
        Schema::dropIfExists('categories');
    }
}

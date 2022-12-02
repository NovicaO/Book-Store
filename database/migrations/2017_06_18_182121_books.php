<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Books extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books',function (Blueprint $table){
            $table->increments('id');
            $table->string('title')->unique();
            $table->integer('publisher_id')->unsigned();
            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->date('publish_date');
            $table->longText('description');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->double('price');
            $table->integer('items');
            $table->string('image_path',256)->default('images/default.jpg');
            $table->boolean('is_active');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('books');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');



    }
}

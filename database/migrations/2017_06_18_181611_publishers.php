<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publishers extends Migration
{
    public function up()
    {
        Schema::create('publishers',function (Blueprint $table){
            $table->increments('id');
            $table->string('name')->unique();
            $table->boolean('is_active');

        });
    }

    public function down()
    {
        Schema::dropIfExists('publishers');
    }
}

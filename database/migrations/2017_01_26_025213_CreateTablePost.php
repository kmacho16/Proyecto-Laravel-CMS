<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Post',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->string('tags');
            $table->integer('id_cat')->unsigned();
            $table->timestamps();
            $table->foreign('id_cat')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Post');
    }
}

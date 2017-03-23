<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableComents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments',function(Blueprint $table){
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('website')->nullable();
            $table->text('comment');
            $table->integer('id_post')->unsigned();
            $table->timestamps();
            $table->foreign('id_post')->references('id')->on('post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

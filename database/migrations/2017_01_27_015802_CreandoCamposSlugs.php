<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreandoCamposSlugs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post',function(Blueprint $table){
            $table->string('slug')->after('title');
        });

        Schema::table('categories',function(Blueprint $table){
            $table->string('slug')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post',function(Blueprint $table){
            $table->dropColumn('slug');
        });

        Schema::table('categories',function(Blueprint $table){
            $table->dropColumn('slug');
        });
    }
}

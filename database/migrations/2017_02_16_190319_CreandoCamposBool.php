<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreandoCamposBool extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post',function(Blueprint $table){
            $table->boolean('recomendado')->default(false)->after('id_cat');
            $table->boolean('privado')->default(false)->after('recomendado');
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
            $table->dropColumn('recomendado');
            $table->dropColumn('privado');
        });
    }
}

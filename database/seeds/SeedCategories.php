<?php

use Illuminate\Database\Seeder;

class SeedCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('categories')->delete();
        DB::table('categories')->insert(
        	[
	        	['name'=>'Aventura','slug'=>'Aventura'],
	        	['name'=>'Terror','slug'=>'Terror'],
	        	['name'=>'Suspenso','slug'=>'Suspenso'],
	        	['name'=>'accion','slug'=>'accion'],
	        	['name'=>'infantil','slug'=>'infantil'],
        	]
        	);
        }
    }

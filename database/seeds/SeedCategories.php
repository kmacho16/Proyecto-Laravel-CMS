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
	        	['name'=>'Aventura'],
	        	['name'=>'Terror'],
	        	['name'=>'Suspenso'],
	        	['name'=>'accion'],
	        	['name'=>'infantil'],
        	]
        	);
        }
    }

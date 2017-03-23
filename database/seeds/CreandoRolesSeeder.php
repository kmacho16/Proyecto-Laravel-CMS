<?php

use Illuminate\Database\Seeder;

class CreandoRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();
        DB::table('roles')->insert(
        	[
	        	['name'=>'Administrador'],
	        	['name'=>'Escritor'],
	        	['name'=>'Visitante'],
        	]
        	);
    }
}

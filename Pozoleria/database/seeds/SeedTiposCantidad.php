<?php

use Illuminate\Database\Seeder;

class SeedTiposCantidad extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('TiposCantidad')->insert([
    		'id' => 1,
        	'nombre' => 'kilos',
    	]);
    	DB::table('TiposCantidad')->insert([
    		'id' => 2,
        	'nombre' => 'onzas',
    	]);
    	DB::table('TiposCantidad')->insert([
    		'id' => 3,
        	'nombre' => 'mililitros',
    	]);
    }
}

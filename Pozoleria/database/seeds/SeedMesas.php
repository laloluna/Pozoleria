<?php

use Illuminate\Database\Seeder;

class SeedMesas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Mesas')->insert([
    		'id' => 1,
        	'nombre' => 'Ventanal 1',
    	]);
        DB::table('Mesas')->insert([
    		'id' => 2,
        	'nombre' => 'Ventanal 2',
    	]);
        DB::table('Mesas')->insert([
    		'id' => 3,
        	'nombre' => 'Central',
    	]);
        DB::table('Mesas')->insert([
    		'id' => 4,
        	'nombre' => 'Entrada 1',
    	]);
        DB::table('Mesas')->insert([
    		'id' => 5,
        	'nombre' => 'Entrada 2',
    	]);
        DB::table('Mesas')->insert([
    		'id' => 6,
        	'nombre' => 'Circular',
    	]);
    }
}

<?php

use Illuminate\Database\Seeder;

class SeedProductos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Productos')->insert([
    		'id' => 1,
        	'nombre' => 'Pozole Rojo Maciza',
        	'alias' => 'PRM',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 2,
        	'nombre' => 'Pozole Rojo Pollo',
        	'alias' => 'PRP',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 3,
        	'nombre' => 'Pozole Rojo Surtido',
        	'alias' => 'PRS',
			'precio' => 55,
    	]);
        //
        DB::table('Productos')->insert([
    		'id' => 4,
        	'nombre' => 'Pozole Verde Maciza',
        	'alias' => 'PVM',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 5,
        	'nombre' => 'Pozole Verde Pollo',
        	'alias' => 'PVP',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 6,
        	'nombre' => 'Pozole Verde Surtido',
        	'alias' => 'PVS',
			'precio' => 55,
    	]);
        //
        DB::table('Productos')->insert([
    		'id' => 7,
        	'nombre' => 'Pozole Blanco Maciza',
        	'alias' => 'PBM',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 8,
        	'nombre' => 'Pozole Blanco Pollo',
        	'alias' => 'PBPC',
			'precio' => 55,
    	]);
        DB::table('Productos')->insert([
    		'id' => 9,
        	'nombre' => 'Pozole Blanco Surtido',
        	'alias' => 'PBSC',
			'precio' => 55,
    	]);
        
        //
        DB::table('Productos')->insert([
    		'id' => 10,
        	'nombre' => 'Tacos de Cochinita',
        	'alias' => 'TDC',
			'precio' => 60,
    	]);
        DB::table('Productos')->insert([
    		'id' => 11,
        	'nombre' => 'Orden de Tostadas',
        	'alias' => 'ODT',
			'precio' => 65,
    	]);
        DB::table('Productos')->insert([
    		'id' => 12,
        	'nombre' => 'Refresco de Lata',
        	'alias' => 'RDL',
			'precio' => 20,
    	]);
        DB::table('Productos')->insert([
    		'id' => 13,
        	'nombre' => 'Refresco de Botella',
        	'alias' => 'RDB',
			'precio' => 30,
    	]);
        DB::table('Productos')->insert([
    		'id' => 14,
        	'nombre' => 'Agua de Sabor',
        	'alias' => 'ADS',
			'precio' => 25,
    	]);
        DB::table('Productos')->insert([
    		'id' => 15,
        	'nombre' => 'Cerveza',
        	'alias' => 'CVZ',
			'precio' => 40,
    	]);
    }
}

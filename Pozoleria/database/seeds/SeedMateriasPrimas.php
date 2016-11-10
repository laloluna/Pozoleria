<?php

use Illuminate\Database\Seeder;

class SeedMateriasPrimas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('MateriasPrimas')->insert([
    		'id' => 1,
        	'nombre' => 'Pan',
        	'precio' => 34,
        	'proveedor' => 2, 
    	]);
    	DB::table('MateriasPrimas')->insert([
    		'id' => 2,
        	'nombre' => 'Leche',
        	'precio' => 15,
        	'proveedor' => 3, 
    	]);
    	DB::table('MateriasPrimas')->insert([
    		'id' => 3,
        	'nombre' => 'Yougurt',
        	'precio' => 56,
        	'proveedor' => 1, 
    	]);
        DB::table('MateriasPrimas')->insert([
            'id' => 4,
            'nombre' => 'Lechuga',
            'precio' => 23,
            'proveedor' => 4, 
        ]);
    }
}

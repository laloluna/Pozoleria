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
        	'nombre' => 'Tostadas',
            'tipoCantidad' => 1,
        	'precio' => 15,
        	'proveedor' => 2, 
    	]);
    	DB::table('MateriasPrimas')->insert([
    		'id' => 2,
        	'nombre' => 'Leche',
            'tipoCantidad' => 2,
        	'precio' => 15,
        	'proveedor' => 1, 
    	]);
    	DB::table('MateriasPrimas')->insert([
    		'id' => 3,
        	'nombre' => 'Paletas',
            'tipoCantidad' => 3,
        	'precio' => 100,
        	'proveedor' => 4, 
    	]);
        DB::table('MateriasPrimas')->insert([
            'id' => 4,
            'nombre' => 'Lechuga',
            'tipoCantidad' => 4,
            'precio' => 23,
            'proveedor' => 3, 
        ]);
        DB::table('MateriasPrimas')->insert([
            'id' => 5,
            'nombre' => 'Maciza',
            'tipoCantidad' => 5,
            'precio' => 45,
            'proveedor' => 5, 
        ]);
    }
}

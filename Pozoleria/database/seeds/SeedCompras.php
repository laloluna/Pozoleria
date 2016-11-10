<?php

use Illuminate\Database\Seeder;

class SeedCompras extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::table('Compras')->insert([
    		'id' => 1,
        	'materiaPrima' => 3,
        	'cantidad' => 34,
        	'tipoCantidad' => 2, 
    	]);
    	DB::table('Compras')->insert([
    		'id' => 2,
        	'materiaPrima' => 1,
        	'cantidad' => 13,
        	'tipoCantidad' => 3, 
    	]);
    	DB::table('Compras')->insert([
    		'id' => 3,
        	'materiaPrima' => 2,
        	'cantidad' => 83,
        	'tipoCantidad' => 1, 
    	]);
        DB::table('Compras')->insert([
            'id' => 4,
            'materiaPrima' => 4,
            'cantidad' => 67,
            'tipoCantidad' => 4, 
        ]);
    }
}

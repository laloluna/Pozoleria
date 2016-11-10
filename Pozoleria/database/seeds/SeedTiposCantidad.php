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
        	'nombre' => 'Kilos',
    	]);
    	DB::table('TiposCantidad')->insert([
    		'id' => 2,
        	'nombre' => 'Gramos',
    	]);
    	DB::table('TiposCantidad')->insert([
    		'id' => 3,
        	'nombre' => 'Litros',
    	]);
        DB::table('TiposCantidad')->insert([
            'id' => 4,
            'nombre' => 'Mililitros',
        ]);
        DB::table('TiposCantidad')->insert([
            'id' => 5,
            'nombre' => 'Onzas',
        ]);
    }
}

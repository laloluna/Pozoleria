<?php

use Illuminate\Database\Seeder;

class SeedProveedores extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Proveedores')->insert([
    		'id' => 1,
        	'nombre' => 'Eduardo Luna',
        	'telefono' => '2223017237',
    	]);
    	DB::table('Proveedores')->insert([
    		'id' => 2,
        	'nombre' => 'Juan Pablo Flores',
        	'telefono' => '2223487263',
    	]);
    	DB::table('Proveedores')->insert([
    		'id' => 3,
        	'nombre' => 'Baxter Lopez',
        	'telefono' => '2223829349',
    	]);
    	DB::table('Proveedores')->insert([
    		'id' => 4,
        	'nombre' => 'Tere Gutierrez',
        	'telefono' => '2221141858',
    	]);
    }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(SeedProveedores::class);
    	$this->call(SeedMateriasPrimas::class);
        $this->call(SeedTiposCantidad::class);
        $this->call(SeedCompras::class);
    }
}

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
        $this->call(SeedUsers::class);
    	$this->call(SeedProveedores::class);
        $this->call(SeedTiposCantidad::class);
        $this->call(SeedMateriasPrimas::class);
        $this->call(SeedCompras::class);
        $this->call(SeedProductos::class);
        $this->call(SeedMesas::class);
    }
}

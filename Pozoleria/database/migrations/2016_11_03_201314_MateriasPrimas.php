<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MateriasPrimas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MateriasPrimas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->integer('tipoCantidad')->unsigned();
            $table->foreign('tipoCantidad')->references('id')->on('TiposCantidad')->onDelete('Cascade');
            $table->integer('precio');
            $table->integer('proveedor')->unsigned();
            $table->foreign('proveedor')->references('id')->on('Proveedores')->onDelete('Cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MateriasPrimas');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Compras extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Compras', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materiaPrima')->unsigned();
            $table->foreign('materiaPrima')->references('id')->on('MateriasPrimas')->onDelete('Cascade');
            $table->integer('cantidad');
            $table->integer('tipoCantidad')->unsigned();
            $table->foreign('tipoCantidad')->references('id')->on('TiposCantidad')->onDelete('Cascade');
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
        Schema::dropIfExists('Compras');
    }
}

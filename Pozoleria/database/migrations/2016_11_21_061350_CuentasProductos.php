<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CuentasProductos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CuentasProductos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cuenta')->unsigned();
            $table->foreign('cuenta')->references('id')->on('Cuentas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('producto')->unsigned();
            $table->foreign('producto')->references('id')->on('Productos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('CuentasProductos');
    }
}

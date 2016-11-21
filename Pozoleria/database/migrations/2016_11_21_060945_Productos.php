<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('alias');
            $table->integer('tipoProducto')->unsigned();
            $table->foreign('tipoProducto')->references('id')->on('TiposProducto')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tamano')->unsigned()->nullable();
            $table->foreign('tamano')->references('id')->on('Tamanos')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('color')->unsigned()->nullable();
            $table->foreign('color')->references('id')->on('Colores')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tipoCarne')->unsigned()->nullable();
            $table->foreign('tipoCarne')->references('id')->on('TiposCarne')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('disponible')->default(true);
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
        Schema::dropIfExists('Productos');
    }
}

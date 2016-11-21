<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cuentas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('mesero')->unsigned();
            $table->foreign('mesero')->references('id')->on('Meseros')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('mesa')->unsigned();
            $table->foreign('mesa')->references('id')->on('Mesas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('personas');
            $table->boolean('descuento');
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
        Schema::dropIfExists('Cuentas');
    }
}

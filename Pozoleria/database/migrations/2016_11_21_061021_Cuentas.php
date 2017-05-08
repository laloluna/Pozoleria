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
            $table->integer('mesa')->unsigned();
            $table->foreign('mesa')->references('id')->on('Mesas')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('total')->default(0);
            $table->boolean('activa')->default(true);
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

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
    protected $table = "Cuentas";

    protected $fillable = ['id', 'mesa', 'total', 'activa', 'disponible'];

    public function mesas()
    {
        return $this->belongsTo('App\Mesa', 'mesa');
    }

    public function productos()
    {
        return $this->belongsToMany('App\Producto', 'CuentasProductos', 'Cuenta', 'Producto');
    }
}

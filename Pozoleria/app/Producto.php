<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "Productos";

    protected $fillable = ['id', 'nombre', 'alias', 'precio'];

    public function cuenta()
    {
        return $this->belongsToMany('App\Cuenta', 'CuentasProductos', 'Cuenta', 'Producto');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Proveedor;

use App\Compra;

class MateriaPrima extends Model
{
    protected $table = "MateriasPrimas";

    protected $fillable = ['id', 'nombre', 'precio'];

    public function compras()
    {
        return $this->hasMany('App\Compra', 'materiaPrima');
    }

    public function proveedores()
    {
        return $this->belongsTo('App\Proveedor', 'proveedor');
    }
}

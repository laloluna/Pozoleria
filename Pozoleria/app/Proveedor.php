<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "Proveedores";

    protected $fillable = ['id', 'nombre', 'telefono'];

    public function MateriasPrimas()
    {
        return $this->hasMany('App\MateriaPrima', 'proveedor');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCantidad extends Model
{
    protected $table = "TiposCantidad";

    protected $fillable = ['id', 'nombre'];

    public function materiasPrimas()
    {
        return $this->hasMany('App\MateriaPrima', 'tipoCantidad');
    }
}

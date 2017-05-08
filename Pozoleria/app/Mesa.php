<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = "Mesas";

    protected $fillable = ['id', 'nombre', 'disponible'];

    public function cuentas()
    {
        return $this->hasMany('App\Cuenta');
    }
}

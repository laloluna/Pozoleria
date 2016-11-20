<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table = "Compras";

    protected $fillable = ['id','materiaPrima', 'cantidad'];

    public function materiasPrimas()
    {
        return $this->belongsTo('App\MateriaPrima', 'materiaPrima');
    }
}

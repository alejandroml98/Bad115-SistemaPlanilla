<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    protected $primaryKey = "codigopuesto";
    public $incrementing = false;

    public function rangoSalario()
    {
        return $this->hasOne(RangoSalarial::class, 'idrangosalarial', 'idrangosalarial');
    }
}


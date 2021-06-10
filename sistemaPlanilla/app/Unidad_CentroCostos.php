<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad_CentroCostos extends Model
{
    protected $primaryKey = "idunidadcentrocostos";
    protected $table = 'unidad_centrocostos';
    protected $dates = ['anio'];
}

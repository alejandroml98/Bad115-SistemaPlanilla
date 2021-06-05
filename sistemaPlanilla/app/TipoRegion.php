<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRegion extends Model
{
    protected $primaryKey = "idTipoRegion";

    public function pais() {
        return $this -> hasMany(Pais::class);
    }
}

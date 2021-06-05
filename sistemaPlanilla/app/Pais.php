<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pais extends Model
{
    protected $primaryKey = "idPais";

    public function tipoRegion() {
        return $this -> belongsTo(TipoRegion::class);
    }
    public function region() {
        return $this -> hasMany(Region::class);
    }
}

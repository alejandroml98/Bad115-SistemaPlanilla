<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $primaryKey = "idRegion";

    public function pais() {
        return $this -> belongsTo(Pais::class);
    }
    public function subRegion() {
        return $this -> hasMany(SubRegion::class);
    }
}

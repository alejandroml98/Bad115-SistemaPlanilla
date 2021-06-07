<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubRegion extends Model
{
    protected $primaryKey = "idSubRegion";

    public function region() {
        return $this -> belongsTo(Region::class);
    }
}

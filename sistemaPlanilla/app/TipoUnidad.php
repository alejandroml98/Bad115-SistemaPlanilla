<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidad extends Model
{
    protected $primaryKey = "idtipounidad";

    public function parent(){
        return $this->belongsTo('App\TipoUnidad');
    }

    public function unidades(){
        return $this->hasMany('App\TipoUnidad', 'idunidadpadre');
    }
}

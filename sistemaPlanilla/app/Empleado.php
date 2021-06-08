<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $primaryKey = "codigoempleado";
    public $incrementing = false;
    protected $dates = ['fechanacimiento'];
}

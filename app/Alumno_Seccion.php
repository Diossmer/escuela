<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alumno_Seccion extends Model
{
    //
    protected $table="alumno_seccion";
    protected $fillable=['seccion_id','alumno_id'];
}

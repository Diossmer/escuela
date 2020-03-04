<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Alumno_Seccion extends Model
{
    //
    protected $table="alumno_seccion";
    protected $fillable=['seccion_id','alumno_id'];


    public function alumnos()
    {
        return $this->belongsTo('App\Docente\Alumno','alumno_id');
    }

    public function secciones()
    {
        return $this->belongsTo('App\Docente\Seccion','seccion_id');
    }

    public function scopeBuscar($query,$nombre){
        if($nombre){
            return $query->where('nombre', 'LIKE', '%'.$nombre.'%');
        }
    }
}

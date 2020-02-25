<?php

namespace App\Docente;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    protected $table='periodos';

    protected $fillable=['periodo_desde','periodo_hasta','fecha_inicio','resultado','estatus','docente_id'];

    protected $guarded=[];

    protected $date=['periodo_hasta','fecha_inicio','periodo_desde'];

    public function seccions(){
        return $this->hasMany(Seccion::class);
    }
    public function users()
    {
        return $this->belongsTo('App\User','docente_id');
    }
}

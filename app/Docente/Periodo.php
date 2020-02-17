<?php

namespace App\Docente;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    //
    protected $table='periodos';

    protected $fillable=['periodo_desde','periodo_hasta','fecha_inicio','resultado','estatus'];

    protected $guarded=[];

    protected $date=['periodo_hasta','fecha_inicio','periodo_desde'];
}

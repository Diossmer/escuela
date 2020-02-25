<?php

namespace App\Docente;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    //
    protected $table="seccions";

    protected $fillable = [
        "descripcion","grado","cupo","periodo_id",
    ];
    protected $guarded=[];

    public function periodos(){
        return $this->belongsTo(Periodo::class,'periodo_id');
    }

}

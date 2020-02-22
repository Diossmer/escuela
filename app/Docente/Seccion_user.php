<?php

namespace App\Docente;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Seccion_user extends Model
{
    //
    protected $table="seccion_user";
    protected $fillable = [
        "descripcion","grado","cupo","docente_id","periodo_id",
    ];
    public function docentes(){
        return $this->belongsToMany(User::class);
    }
}

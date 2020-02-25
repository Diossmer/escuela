<?php

namespace App\Docente;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    //
    protected $table="representantes";
    protected $fillable= [
        'nombre','segundo_nombre','apellido',
        'segundo_apellido','cedula','email',
        'fecha_nacimiento','trabajo','grado_instruccion',
        'profesion_ocupacion','lugar_trabajo',
        'telefono','sexo',
    ];
    protected $hidden = [''];
    protected $casts = [''];
    protected $guarded = [''];
    protected $date = [''];
    public function scopeBuscar($query,$nombres){
        if($nombres){
            return $query->where('nombre', 'LIKE', '%'.$nombres.'%');
        }
    }
}

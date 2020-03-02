<?php

namespace App\Docente;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $table="alumnos";
    protected $fillable=[
        'nombre', 'segundo_nombre', 'apellido', 'segundo_apellido',
        'lugar_nacimiento','direccion','fecha','cedula',
        'email','sexo','camisa','pantalon','zapato','fotos',
        'enfermedades_padecida','enfermedades_psicologica','representante_id'
    ];
    protected $hidden = [''];
    protected $casts = [''];
    protected $guarded = [''];
    protected $date = [''];

    public function representantes(){
        return $this->belongsTo(Representante::class,'representante_id');
    }
    public function secciones(){
        return $this->belongsToMany(Seccion::class,'alumno_seccion','seccion_id','alumno_id','grado_id');
    }
}

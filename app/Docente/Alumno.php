<?php

namespace App\Docente;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    //
    protected $table="";
    protected $fillable=[
        'nombre', 'segundo_nombre', 'apellido', 'segundo_apellido',
        'lugar_nacimiento','direccion','dia','mes','año','cedula',
        'email','sexo','camisa','pantalon','zapato','fotos',
        'enfermedades_padecida','enfermedades_psicologica','representante_id'
    ];
    protected $hidden = [''];
    protected $casts = [''];
    protected $guarded = [''];
    protected $date = [''];
    
    public function representantes(){
        return $this->hasMany(Representante::class,'representante_id');
    }
}

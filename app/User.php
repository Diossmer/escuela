<?php

namespace App;

use App\Docente\Alumno;
use App\Docente\Periodo;
use App\Docente\Representante;
use App\Docente\Seccion;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'seg_nombre', 'apellido','seg_apellido',
        'fecha','nacionalidad','localidad','direccion','telefono',
        'email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles(){
        return $this->belongsToMany(Role::class,"role_user");
    }

    public function hasAnyRoles($roles){
        return null !== $this->roles()->whereIn('nombre',$roles)->first();
    }
    public function hasAnyRole($role){
        return null !== $this->roles()->where('nombre',$role)->first();
    }
    public function scopeNombre($query,$nombre){
        if($nombre)
        return $query->where('nombre', 'LIKE', '%'.$nombre.'%');
    }
    /*** DOCENTE, PERIODO, SECCION, REPRESENTANTE Y ALUMNO ***/

    public function periodos()
    {
        return $this->hasMany('App\Docente\Periodo','docente_id');
    }
    public function userSeccion(){
        return $this->hasManyThrough(Seccion::class,Periodo::class,'docente_id','periodo_id');
    }
    public function representantes(){
        return $this->hasMany(Representante::class,'docente_id');
    }
    public function userAlumno(){
        return $this->hasManyThrough(Alumno::class,Representante::class,'docente_id','representante_id');
    }
}

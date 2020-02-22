<?php

namespace App;

use App\Docente\Seccion_user;
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
        return $this->belongsToMany(Role::class);
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
    /* DOCENTE, PERIODO, SECCION, REPRESENTANTE Y ALUMNO */
    public function seccions(){
        return $this->belongsToMany(Seccion_user::class);
    }
}

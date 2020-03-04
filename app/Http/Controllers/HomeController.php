<?php

namespace App\Http\Controllers;

use App\Docente\Seccion;
use Illuminate\Http\Request;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $seccion =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',1)
        ->get();
        $count =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',1)
        ->get()->count();
        foreach ($seccion as $datos) {
            $datos;
        }
        $seccion2 =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',2)
        ->get();
        $count2 =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',2)
        ->get()->count();
        foreach ($seccion2 as $datos2) {
            $datos2;
        }
        $seccion3 =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',2)
        ->get();
        $count3 =Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',2)
        ->get()->count();
        foreach ($seccion3 as $datos3) {
            $datos3;
        }
        return view('home',compact('datos','datos2','datos3','count','count2','count3'));
    }
}

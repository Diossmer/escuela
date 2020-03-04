<?php

namespace App\Http\Controllers;

use App\Alumno_Seccion;
use App\Docente\Alumno;
use App\Docente\Seccion;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $nombre = $request->nombre;
        $inscripcion = Alumno_Seccion::with('alumnos','secciones')->get();

        return view('inscripcion.inicio',compact('inscripcion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $alumno = Alumno::pluck('nombre','id');

        $seccion = Seccion::pluck('descripcion','id');

        return view('inscripcion.crear',compact('alumno','seccion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    $a= Seccion::get();
    // || $a[0]->grado == $request->grado;

    $cupo= Seccion::leftJoin('alumno_seccion', function ($join) {
        $join->on('seccion_id', '=', 'alumno_seccion.seccion_id')
        ->where('alumno_seccion.seccion_id','=',0);})
        ->get();
        $ingreso = Seccion::Join('alumno_seccion','seccions.id','=','alumno_seccion.seccion_id')
        ->where('grado','=',1)
        ->get()->count();
        if($a[0]->descripcion =="A1"){

                if($ingreso < $cupo[0]->cupo){
                    $inscripcion = new Alumno_Seccion();
                    $inscripcion->alumno_id = $request->alumno_id;
                    $inscripcion->seccion_id = $request->seccion_id;
                    $inscripcion->save();
                return redirect('inscripcion')->with("inscripcion","Se agrego a la sección");
                }else{
                    return redirect('inscripcion/create')->with("inscripcion","no puede agregar en esta seccion");
                }
        }elseif($a[0]->descripcion =="A2"){
            if($ingreso < $cupo[0]->cupo){
                $inscripcion = new Alumno_Seccion();
                $inscripcion->alumno_id = $request->alumno_id;
                $inscripcion->seccion_id = $request->seccion_id;
                $inscripcion->save();
            return redirect('inscripcion')->with("inscripcion","Se agrego a la sección");
            }else{
                return redirect('inscripcion/create')->with("inscripcion","no puede agregar en esta seccion");
            }
        }
        return redirect('inscripcion/create')->with("inscripcion","no puede agregar más");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Alumno_Seccion::destroy($id);
        return redirect('inscripcion');
    }
}

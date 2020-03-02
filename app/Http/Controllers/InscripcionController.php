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
    public function index()
    {
        //
        // return view('inscripcion.crear');
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
    $a= Seccion::where('descripcion','>','A')->get();
    // || $a[0]->grado == $request->grado;


    $cupo= Seccion::leftJoin('alumno_seccion', function ($join) {
        $join->on('seccion_id', '=', 'alumno_seccion.seccion_id')
        ->where('alumno_seccion.seccion_id','>',0);})
        // ->select('seccions.*')
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
                return redirect('inscripcion/create')->with("inscripcion","Se agrego a la sección");
                }else{
                    return redirect('inscripcion/create')->with("inscripcion","no puede agregar en esta seccion");
                }
        }elseif($a[0]->descripcion =="A2"){
            if($ingreso < $cupo[0]->cupo){
                $inscripcion = new Alumno_Seccion();
                $inscripcion->alumno_id = $request->alumno_id;
                $inscripcion->seccion_id = $request->seccion_id;
                $inscripcion->save();
            return redirect('inscripcion/create')->with("inscripcion","Se agrego a la sección");
            }else{
                return redirect('inscripcion/create')->with("inscripcion","no puede agregar en esta seccion");
            }
        }
        return redirect('inscripcion/create')->with("inscripcion","no puede agregar más");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $alumno = Alumno::pluck('nombre','id');
        $seccion = Seccion::pluck('descripcion','id');
        return view('inscripcion.editar',compact('alumno','seccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return redirect('inscripcion');
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
    }
}

<?php

namespace App\Http\Controllers\Docente;

use App\Docente\Periodo;
use App\Docente\Seccion;
use App\Http\Requests\SeccionVerification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $seccion = Seccion::all();
        return view('seccion.inicio',compact('seccion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $periodo = Periodo::pluck('periodo_desde','id');
        return view('seccion.crear',compact('periodo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SeccionVerification $request)
    {
        //
        Seccion::create($request->all());
        return redirect('seccion')->with('seccion','Registro con exito!!!');
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
        return view('seccion.mostrar');
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
        $periodo = Periodo::pluck('periodo_desde','id');
        $seccion = Seccion::find($id);
        return view('seccion.editar',compact('seccion','periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SeccionVerification $request, $id)
    {
        //
        $seccion = Seccion::find($id);
        $seccion->descripcion = $request->descripcion;
        $seccion->grado = $request->grado;
        $seccion->cupo = $request->cupo;
        $seccion->periodo_id = $request->periodo_id;
        $seccion->save();
        return redirect('seccion')->with('seccion','Actualización con exito!!!');
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
        return redirect('seccion');
    }
}

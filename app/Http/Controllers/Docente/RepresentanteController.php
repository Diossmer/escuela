<?php

namespace App\Http\Controllers\Docente;

use App\Docente\Representante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RepresentanteVerification;

class RepresentanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $nombres = $request->nombre;

        $representante = Representante::buscar($nombres)->orderBy('nombre','Asc')->paginate(5);
        return view('representante.inicio',compact('representante'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('representante.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RepresentanteVerification $request)
    {
        //
        $representante = new Representante();
        $representante->nombre = $request->nombre;
        $representante->segundo_nombre = $request->segundo_nombre;
        $representante->apellido = $request->apellido;
        $representante->segundo_apellido = $request->segundo_apellido;
        $representante->cedula = $request->cedula;
        $representante->email = $request->email;
        $representante->fecha_nacimiento = $request->fecha_nacimiento;
        $representante->trabajo = $request->trabajo;
        $representante->grado_instruccion = $request->grado_instruccion;
        $representante->profesion_ocupacion = $request->profesion_ocupacion;
        $representante->lugar_trabajo = $request->lugar_trabajo;
        $representante->telefono = $request->telefono;
        $representante->sexo = $request->sexo;
        $representante->save();
        return redirect('representante')->with('representante','Exito registro.');
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
        $representante = Representante::findOrFail($id);
        return view('representante.mostrar',compact('representante'));
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
        $representante = Representante::findOrFail($id);
        return view('representante.editar',compact('representante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RepresentanteVerification $request, $id)
    {
        //
        $representante = Representante::find($id);
        $representante->nombre = $request->nombre;
        $representante->segundo_nombre = $request->segundo_nombre;
        $representante->apellido = $request->apellido;
        $representante->segundo_apellido = $request->segundo_apellido;
        $representante->cedula = $request->cedula;
        $representante->email = $request->email;
        $representante->fecha_nacimiento = $request->fecha_nacimiento;
        $representante->trabajo = $request->trabajo;
        $representante->grado_instruccion = $request->grado_instruccion;
        $representante->profesion_ocupacion = $request->profesion_ocupacion;
        $representante->lugar_trabajo = $request->lugar_trabajo;
        $representante->telefono = $request->telefono;
        $representante->sexo = $request->sexo;
        $representante->save();
        return redirect('representante')->with('representante','Actualizado con exito.');
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
        return redirect('');
    }
}

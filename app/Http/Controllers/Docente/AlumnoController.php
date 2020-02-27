<?php

namespace App\Http\Controllers\Docente;

use App\Docente\Alumno;
use App\Docente\Representante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlumnoValidation;

class AlumnoController extends Controller
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

        $alumno = Alumno::where('nombre','like','%'.$nombres.'%')->orderBy('nombre','Asc')->paginate(5);
        return view('alumno.inicio',compact('alumno'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $representante=Representante::pluck('nombre','id');
        return view('alumno.crear',compact('representante'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumnoValidation $request)
    {
        //
        if($request->hasFile('fotos')){
            $archivo=Request()->except('_token');
            $archivo = $request->file('fotos');
            $nombre= time().$archivo->getClientOriginalName();
            $archivo->move(public_path().'/images/',$nombre);
        }

        $alumno = new Alumno();
        $alumno->fotos=$nombre;
        $alumno->nombre = $request->nombre;
        $alumno->segundo_nombre = $request->segundo_nombre;
        $alumno->apellido = $request->apellido;
        $alumno->segundo_apellido = $request->segundo_apellido;
        $alumno->lugar_nacimiento = $request->lugar_nacimiento;
        $alumno->direccion = $request->direccion;
        $alumno->fecha = $request->fecha;
        $alumno->cedula = $request->cedula;
        $alumno->email = $request->email;
        $alumno->sexo = $request->sexo;
        $alumno->camisa = $request->camisa;
        $alumno->pantalon = $request->pantalon;
        $alumno->zapato = $request->zapato;
        $alumno->enfermedades_padecida = $request->enfermedades_padecida;
        $alumno->enfermedades_psicologica = $request->enfermedades_psicologica;
        $alumno->representante_id = $request->representante_id;
        $alumno->save();
        return redirect('alumno')->with('alumno','Registro con exito.');
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
        $alumno=Alumno::find($id);
        return view('alumno.mostrar',compact('alumno'));
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
        $alumno=Alumno::find($id);
        $representante=Representante::pluck('nombre','id');
        return view('alumno.editar',compact('alumno','representante'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlumnoValidation $request, $id)
    {
        //
        $alumno = Alumno::find($id);
        if($request->hasFile('fotos')){
            // $archivo=Request()->except('_token');
            $archivo = $request->file('fotos');
            $nombre= time().$archivo->getClientOriginalName();
            $nombre=$alumno->fotos;
            $archivo->move(public_path().'/images/',$nombre);
        }
        $alumno->nombre = $request->nombre;
        $alumno->segundo_nombre = $request->segundo_nombre;
        $alumno->apellido = $request->apellido;
        $alumno->segundo_apellido = $request->segundo_apellido;
        $alumno->lugar_nacimiento = $request->lugar_nacimiento;
        $alumno->direccion = $request->direccion;
        $alumno->fecha = $request->fecha;
        $alumno->cedula = $request->cedula;
        $alumno->email = $request->email;
        $alumno->sexo = $request->sexo;
        $alumno->camisa = $request->camisa;
        $alumno->pantalon = $request->pantalon;
        $alumno->zapato = $request->zapato;
        $alumno->enfermedades_padecida = $request->enfermedades_padecida;
        $alumno->enfermedades_psicologica = $request->enfermedades_psicologica;
        $alumno->representante_id = $request->representante_id;
        if($alumno->save()){
            return redirect('alumno')->with('alumno','Actualización con exito.');
        }
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
        return redirect('alumno');
    }
}

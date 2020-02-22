<?php

namespace App\Http\Controllers\Docente;

use App\Docente\Periodo;
use App\Docente\Seccion_user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
        $seccion = Seccion_user::all();
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
        $docente = User::join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id','>',1);})
            ->select('users.*')
            ->orderBy('nombre','Asc')
            ->pluck('nombre','id');
        $periodo = Periodo::pluck('periodo_desde','id');
        return view('seccion.crear',compact('docente','periodo'));
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
        Seccion_user::create($request->all());
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
        $docente = User::join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id','>',1);})
            ->select('users.*')
            ->orderBy('nombre','Asc')
            ->pluck('nombre','id');
        $seccion = Seccion_user::find($id);
        $periodo = Periodo::pluck('periodo_desde','id');
        return view('seccion.editar',compact('docente','seccion','periodo'));
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
        $seccion = Seccion_user::find($id);
        $seccion->descripcion = $request->descripcion;
        $seccion->grado = $request->grado;
        $seccion->cupo = $request->cupo;
        $seccion->docente_id = $request->docente_id;
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

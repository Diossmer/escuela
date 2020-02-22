<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Requests\PerDocenValidation;
use App\Http\Controllers\Controller;
use App\User;
use App\Docente\Periodo;
use App\Docente\Seccion_user;
use Carbon\Carbon;

class DocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //PERIODO
        $periodo = Periodo::paginate(5);
        $carbon = Carbon::now()->format("H:i:s");
        // dd($carbon);
        return view('periodo.inicio',compact('periodo','carbon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //PERIODO
        $carbon= Carbon::now()->format('Y-m-d');
        return view('periodo.crear',compact('carbon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PerDocenValidation $request)
    {
        //PERIODO
        $date2=strtotime($request->periodo_hasta);
        $date1=strtotime($request->fecha_inicio);
        $valor=round((($date2-$date1)/120/60/60),2);
        $resultado = $valor *30/100 ;
        if($resultado>1 || $resultado<100){
            $periodo = new Periodo();
            $periodo->periodo_desde=$request->periodo_desde;
            $periodo->periodo_hasta=$request->periodo_hasta;
            $periodo->fecha_inicio=$request->fecha_inicio;
            $periodo->resultado=$resultado;
            $periodo->save();
            return redirect('periodo')->with('docente','Periodo Escolar, Creado con éxito.');
        }
        return redirect('periodo')->with('docente','Esé periodo escolar conluyó.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //DOCENTE
        $docente = User::find($id);
        $periodo = Periodo::find($id);
        $seccion = Seccion_user::find($id);
        return view('docente.mostrar',compact('docente','periodo','seccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //PERIODO
        $periodo = Periodo::find($id);
        return view('periodo.editar',compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PerDocenValidation $request, $id)
    {
        //PERIODO
        $date2=strtotime($request->periodo_hasta);
        $date1=strtotime($request->fecha_inicio);
        $valor=round((($date2-$date1)/120/60/60),2);
        $resultado = $valor *30/100 ;
        if($resultado>0){
            $periodo = Periodo::find($id);
            $periodo->periodo_desde=$request->periodo_desde;
            $periodo->periodo_hasta=$request->periodo_hasta;
            $periodo->fecha_inicio=$request->fecha_inicio;
            $periodo->resultado=$resultado;
            $periodo->save();
            return redirect('periodo')->with('docente','Periodo Escolar, Acualizado con éxito.');
        }
        return redirect('periodo')->with('docente','Esé periodo escolar conluyó.');
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
        return redirect();
    }
}

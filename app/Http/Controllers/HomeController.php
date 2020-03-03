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
        $seccion=Seccion::select('descripcion','cupo')->get();
        foreach ($seccion as $value) {
            $value;
        }
        dd($seccion);
        return view('home');
    }
}

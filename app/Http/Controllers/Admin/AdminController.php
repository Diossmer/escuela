<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;

class AdminController extends Controller
{
    public function user()
    {
        //
        //where('nombre','like','%valor%')->orderBy('nombre','desc')->get(); Muestrame la letras v ordenada
        //$docente = User::where('nombre','>','b')->orderBy('nombre','desc')->paginate(5); Muestrame en mayor a menor el abecedario

        $docente = User::join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id','>',1);})
            ->select('users.*')
            ->orderBy('nombre','desc')
            ->paginate(5);
        return view('admin.user',compact('docente'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //where('nombre','administrador')->orderBy('nombre','asc')->get(); Muestrame un valor
        /*join('role_user', 'users.id', '=', 'role_user.user_id')
        ->select('users.*','role_user.role_id')
        ->get();
        Join('roles', 'users.id', '=', 'roles.id') */


        $admin = User::join('role_user', function ($join) {
            $join->on('users.id', '=', 'role_user.user_id')
            ->where('role_user.role_id','=',1);})
            ->select('users.*')
            ->orderBy('nombre','asc')
            ->paginate(5);
        // return $admin;
        return view('admin.inicio',compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role = Role::pluck('nombre','id');
        return view('admin.crear',compact('role'));
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
        if($request->password == $request->passwords){
            $admin = User::create([
                'nombre'=>$request->nombre,
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                ]);
            if($request->role==1){
                $admin->roles()->attach($request->role);
                return redirect('admin')->with('admin','Creado con Exito');
            }else{
                $admin->roles()->attach($request->role);
                return redirect('admin/user')->with('admin','Creado con Exito');
            }
        }
    return redirect('admin/create')->with('admin','Nínguna de la contraseña coinciden.');
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
        return view('admin.mostrar');
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
        $role=Role::pluck('nombre','id');
        $admin=User::find($id);
        return view('admin.editar',compact('admin','role'));
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
        $admin = User::find($id);
            $admin->nombre=$request->nombre;
            $admin->email=$request->email;
            $admin->password=bcrypt($request->password);
        $admin->save();
        $admin->roles()->detach();
        if($request->role==1){
            $admin->roles()->attach($request->role);
            return redirect('admin')->with('admin','Actualizado');
        }else{
            $admin->roles()->attach($request->role);
            return redirect('admin/user')->with('admin','Actualizado');
        }
    //return redirect('admin/'.$id.'/edit')->with('admin','fallido');
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
        User::destroy($id);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $role = Role::all();
        return view('roles.inicio',compact('role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('roles.crear');
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
        Role::create(['nombre'=>$request->nombre]);
        return redirect('roles')->with('admin','Exito.');
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
        $role = Role::find($id);
        return view('roles.editar',compact('role'));
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
        $role=Role::find($id);
        $role->nombre = $request->nombre;
        $role->save();
        $role->users()->detach();
        return redirect('roles')->with('admin','Actualizado');
    }
    public function destroy($id)
    {
        //
        $usuario = User::join('role_user', 'users.id', '=', 'role_user.user_id')
        ->where('role_user.role_id','=',$id)
        ->select('users.*')
        ->orderBy('name','desc')
        ->find($id);
        if(isset($usuario)){
            return redirect('rols')->with('rols','No puede eliminar el rol, ya está asignado.');
        }else{
            Role::destroy($id);
            return redirect('rols')->with('rols','Se ha eliminado el rol con exito.');
        }
    }
}

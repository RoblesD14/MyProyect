<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::paginate(5);
        return view('sistema.roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = null;
        $mostrar =null;
        return view('sistema.roles.create',compact('role','mostrar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'name'=>'required',
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
        ];
        $this->validate($request,$campos,$mensaje);

        $role = Role::create([
            'name' => $request->name
        ]);

        return redirect()->route('roles.index')
            ->with('success', 'Rol registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $mostrar = 'mostrar';
        return view('sistema.roles.show',compact('role','mostrar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $mostrar = null;
        return view('sistema.roles.edit',compact('role','mostrar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $campos=[
            'name'=>'required',
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
        ];
        $this->validate($request,$campos,$mensaje);

        $role->name = $request->name;
        $role->save();

        return redirect()->route('roles.index')
            ->with('success', 'Rol modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id)->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Rol eliminado correctamente');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->paginate(5);
        return view('sistema.usuarios.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Rsponse
     */
    public function create()
    {
        $user = null;
        $mostrar ='nuevo';
        $roles = Role::get()->pluck('name','id')->toArray();
        return view('sistema.usuarios.create',compact('user','mostrar','roles'));
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' =>'required',
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
            'confirmed' =>'* No Coincide las Contraseñas',
            'min:' => 'Ingrese mínimo :min caracteres',
            'email' => 'E-mail no válido'
        ];
        $this->validate($request,$campos,$mensaje);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->name)
        ]);

        $role = Role::find($request->role_id);

        $user->syncRoles($request->role_id);

        return redirect()->route('users.index')
                    ->with('success', 'Usuario registrado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = user::with('roles')->find($id);
        $roles = Role::get()->pluck('name','id')->toArray();
        $mostrar = 'mostrar';
        return view('sistema.usuarios.show',compact('user','mostrar','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::with('roles')->find($id);
        $roles = Role::get()->pluck('name','id')->toArray();
        $mostrar = 'editar';
        return view('sistema.usuarios.edit',compact('roles','mostrar','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $campos=[
            'name'=>'required',
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
        ];
        $this->validate($request,$campos,$mensaje);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $user->syncRoles($request->role_id);

        return redirect()->route('users.index')
            ->with('success', 'usuario modificado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'Usuario eliminado correctamente');
    }
}

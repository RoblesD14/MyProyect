<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionRoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();

        return view('sistema.permission-role.index',compact('roles'));
    }

    public function listarPermissionRoles(Request $request)
    {
        $permissions= Permission::get();
        $role = Role::with('permissions')->where('roles.id',$request->role_id)->first();
        return view('sistema.permission-role.permissions',compact('role','permissions'));
    }

    public function store(Request $request)
    {
        $role = Role::where('id',$request->permission_role_id)->first();

        //$role->permisos()->sync($request->get('permission_role'));
        $role->syncPermissions($request->permission_role);

        return redirect()->route('permission-role.index')
        ->with('success', 'Permiso Asignado satisfactoriamente a '.$role->name);
    }
}

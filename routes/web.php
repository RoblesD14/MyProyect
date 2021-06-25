<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PermissionRoleController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('empleado', EmpleadoController::class)->middleware('auth');

Auth::routes(['register'=>true,'reset'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function () {

    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
    Route::get('/', [ClienteController::class, 'index'])->name('home');
});

Route::resource('servicios', ServicioController::class)->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');
Route::resource('roles', RoleController::class)->middleware('auth');
Route::resource('permissions', PermissionController::class)->middleware('auth');
Route::resource('users', UsuarioController::class)->middleware('auth');

Route::group(['prefix' => 'permission-role', 'middleware' => 'auth'], function(){
    Route::get('/', [ PermissionRoleController::class,'index'])->name('permission-role.index');
    Route::get('listarPermissionRoles',[PermissionRoleController::class,'listarPermissionRoles'])->name('menu-role.listar-menu-roles');
    Route::post('guardar',[PermissionRoleController::class,'store'])->name('permission-role.store');
});

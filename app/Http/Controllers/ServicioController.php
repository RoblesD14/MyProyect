<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\Servicio;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Empleado;

class ServicioController extends Controller
{
    public function index()
    {
        $servicios = Servicio::with(['categoria:id,nombre'])->paginate();

        return view('servicio.index', compact('servicios'))
                ->with('i', (request()->input('page', 1) - 1) * $servicios->perPage());
    }

    public function create()
    {
        $servicio = new Servicio();
        $categorias = Categoria::get()->pluck('nombre','id')->toArray();
        $empleados = Empleado::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $clientes = Cliente::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $mostrar =null;
        return view('servicio.create', compact('servicio','categorias','empleados','clientes','mostrar'));
    }

    public function store(Request $request)
    {
        $campos=[
            'categoria_id'=>'required',
            'fservicio'=>'required',
            'descripcion'=>'required|string|max:191',
            'cliente_id'=>'required',
            'empleado_id'=>'required',
            'monto'=>'required|numeric',
            'formapago' => 'required|string|max:191',
            'fpago'=>'required'
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
            'numeric' =>'Ingrese solo números'
        ];
        $this->validate($request,$campos,$mensaje);

        $servicio = Servicio::create([
            'categoria_id' => $request->categoria_id,
            'fservicio' => $request->fservicio.' '.date('H:i:s'),
            'descripcion' => $request->descripcion,
            'cliente_id' => $request->cliente_id,
            'empleado_id' => $request->empleado_id,
            'monto' => $request->monto,
            'formapago' => $request->formapago,
            'fpago' => $request->fpago.' '.date('H:i:s'),
            'user_id' => Auth::user()->id,
            'estado' => 1
        ]);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio registrado correctamente.');
    }

    public function show($id)
    {
        $servicio = Servicio::find($id);

        $categorias = Categoria::get()->pluck('nombre','id')->toArray();
        $empleados = Empleado::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $clientes = Cliente::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $mostrar = "mostrar";

        return view('servicio.show', compact('servicio','categorias','empleados','clientes','mostrar'));
    }

    public function edit($id)
    {
        $servicio = Servicio::find($id);
        $categorias = Categoria::get()->pluck('nombre','id')->toArray();
        $empleados = Empleado::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $clientes = Cliente::select(DB::Raw("CONCAT( Nombre,' ',ApellidoPaterno,' ',ApellidoMaterno) as nombre_completo"),'id')->pluck('nombre_completo','id')->toArray();
        $mostrar =null;
        return view('servicio.edit', compact('servicio','categorias','empleados','clientes','mostrar'));
    }

    public function update(Request $request, Servicio $servicio)
    {
        $campos=[
            'categoria_id'=>'required',
            'fservicio'=>'required',
            'descripcion'=>'required|string|max:191',
            'cliente_id'=>'required',
            'empleado_id'=>'required',
            'monto'=>'required|numeric',
            'formapago' => 'required|string|max:191',
            'fpago'=>'required'
        ];
        $mensaje=[
            'required'=>'* Campo Obligatorio',
            'numeric' =>'Ingrese solo números'
        ];

        $this->validate($request,$campos,$mensaje);


        $servicio->update([
            'categoria_id' => $request->categoria_id,
            'fservicio' => $request->fservicio.' '.date('H:i:s'),
            'descripcion' => $request->descripcion,
            'cliente_id' => $request->cliente_id,
            'empleado_id' => $request->empleado_id,
            'monto' => $request->monto,
            'formapago' => $request->formapago,
            'fpago' => $request->fpago.' '.date('H:i:s'),
            'user_id' => Auth::user()->id,
            'estado' => $request->estado
        ]);

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio modificado correctamente.');
    }

     /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $servicio = Servicio::find($id)->delete();

        return redirect()->route('servicios.index')
            ->with('success', 'Servicio eliminado correctamente');
    }
}

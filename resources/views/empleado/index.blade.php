@extends('layouts.master-layout')

@section('content')
    <div class="container">

            @if(Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible" role="alert">
                {{ Session::get('mensaje') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
             {{-- @can('empleados.crear') --}}
        <div class="float-right">
        <a class="btn btn-primary mb-3" href="{{ url('empleado/create') }}">
        Crear Nuevo
        </a>
        </div>
       {{-- @endcan --}}

        <table class="table table-sm table-bordered">
            <thead class="thead-light text-lg-center">
                <tr>
                    <th>#</th>
                    <th>Fotografia</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="text-lg-center">
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id}}</td>
                    <td>
                    <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
                    </td>
                    <td>{{ $empleado->Nombre}}</td>
                    <td>{{ $empleado->ApellidoPaterno}}</td>
                    <td>{{ $empleado->ApellidoMaterno}}</td>
                    <td>{{ $empleado->Correo}}</td>
                    <td>
                         {{--@can('empleados.editar') --}}
                    <a class="btn btn-primary btn-sm mr-1" href="{{ url('/empleado/'.$empleado->id.'/edit') }}">
                        <i class="fa fa-edit"></i> Editar
                    </a>
                        {{--  @endcan
                          @can('empleados.eliminar') --}}
                    <form action="{{ url('/empleado/'.$empleado->id) }}" class="d-inline" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input class="btn btn-danger ml-1 btn-sm" type="submit" onclick="return confirm('Desea eliminar?')" value="Borrar">
                    </form>
    {{-- @endcan --}}
    </td>
</tr>
@endforeach
</tbody>
</table>
<div class="d-flex justify-content-center">
{!! $empleados->links() !!}
</div>
</div>
@endsection

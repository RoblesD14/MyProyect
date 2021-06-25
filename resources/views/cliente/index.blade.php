@extends('layouts.master-layout')

@section('template_title')
    Cliente
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h5 class="m-0 font-weight-bold text-primary">Cliente</h5>
                            </span>
                            {{-- @can('clientes.crear') --}}
                            <div class="float-right">

                                <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear Nuevo') }}
                                </a>
                            </div>
                            {{-- @endcan --}}
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover table-sm table-bordered">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>

										<th>Nombre</th>
										<th>Apellido Paterno</th>
										<th>Apellido Materno</th>
										<th>Ciudad</th>
										<th>Direccion</th>
										<th>Celular</th>
                                        <th>Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clientes as $cliente)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $cliente->Nombre }}</td>
											<td>{{ $cliente->ApellidoPaterno }}</td>
											<td>{{ $cliente->ApellidoMaterno }}</td>
											<td>{{ $cliente->Ciudad }}</td>
											<td>{{ $cliente->Direccion }}</td>
											<td>{{ $cliente->Celular }}</td>

                                            <td>
                                                <form action="{{ route('clientes.destroy',$cliente->id) }}" method="POST">
                                                    {{-- @can('clientes.mostrar') --}}
                                                    <a class="btn btn-sm bn-info" href="{{ route('clientes.show',$cliente->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    {{-- @endcan
                                                    @can('clientes.editar') --}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('clientes.edit',$cliente->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{-- @endcan --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    {{-- @can('clientes.eliminar') --}}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    {{-- @endcan --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $clientes->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

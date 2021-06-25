@extends('layouts.master-layout')

@section('template_title')
    Servicio
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h5 class="m-0 font-weight-bold text-primary">Servicios</h5>
                            </span>
                          {{--  @can('servicios.crear') --}}
                             <div class="float-right">
                                <a href="{{ route('servicios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            <table class="table table-striped table-hover table-bordered table-sm">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
										<th>F. Servicio</th>
										<th>Descripcion</th>
										<th>Categor&iacute;a</th>
										<th>Monto</th>
										<th>Forma Pago</th>
										<th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($servicios as $servicio)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ \Carbon\Carbon::parse($servicio->fservicio)->format('d/m/Y H:i:s') }}</td>
											<td>{{ $servicio->descripcion }}</td>
											<td>{{ $servicio->categoria->nombre }}</td>
											<td>{{ $servicio->monto }}</td>
											<td>{{ $servicio->formapago }}</td>
											<td>
                                                @if ($servicio->estado == 1)
                                                <span class="badge badge-success">Activo</span>
                                                @else
                                                <span class="badge badge-danger">Inactivo</span>
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('servicios.destroy',$servicio->id) }}" method="POST">
                                                   {{-- @can('servicios.mostrar') --}}
                                                    <a class="btn btn-sm btn-warning" href="{{ route('servicios.show',$servicio->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                {{--    @endcan --
                                                    @can('servicios.editar') --}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('servicios.edit',$servicio->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                {{--    @endcan --}}
                                                    @csrf
                                                    @method('DELETE')
                                                   {{-- @can('servicios.eliminar') --}}
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    {{--@endcan --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-danger text-center">
                                                -- Datos No Registrados
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    {!! $servicios->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


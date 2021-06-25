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
                                <h5 class="m-0 font-weight-bold text-primary">Permisos</h5>
                            </span>

                            {{-- @can('permisos.crear') --}}
                            <div class="float-right">
                                <a href="{{ route('permissions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                    <i class="fas fa-plus"></i>    {{ __('Nuevo Permiso') }}
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
										<th>Nombre</th>
										<th>Guard name</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($permissions as $permission)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
											<td>{{ $permission->name }}</td>
											<td>{{ $permission->guard_name }}</td>
                                            <td>
                                                <form action="{{ route('permissions.destroy',$permission->id) }}" method="POST">
                                                    {{-- @can('permisos.mostrar') --}}
                                                    <a class="btn btn-sm btn-warning" href="{{ route('permissions.show',$permission->id) }}"><i class="fa fa-fw fa-eye"></i> Mostrar</a>
                                                    {{-- @endcan --}}
                                                    {{-- @can('permisos.editar') --}}
                                                    <a class="btn btn-sm btn-primary" href="{{ route('permissions.edit',$permission->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    {{-- @endcan --}}
                                                    {{-- @can('permisos.eliminar') --}}
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Eliminar</button>
                                                    {{-- @endcan --}}
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-danger text-center">
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
                    {!! $permissions->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

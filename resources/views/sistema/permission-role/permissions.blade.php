<div class="card" style="border:1px solid #f1556c !important">
    <div class="card-header bg-danger py-2 text-white">
        <h5 class="card-title mb-0 text-white" >
            Permisos Para:... {{ $role->name}}
        </h5>
    </div>
    <div id="cardCollpase4" class="collapse show">
        <div class="card-body">
            <form method="POST" action="{{ route('permission-role.store') }}" id="form-permiso-role">
                @csrf
                <input type="hidden" name="permission_role_id" id="permission_role_id" value="{{ $role->id }}">
                <div class="tab-content pt-0" id="tab-contenido">
                    @forelse ($permissions as $permission)
                        @php
                            $encontrado = '';
                            foreach ($role->permissions as $role_permiso) {
                                if($permission->id == $role_permiso->id)
                                {
                                    $encontrado = 'checked';
                                }
                            }
                        @endphp
                         <dl>
                            <input type="checkbox" id="permission_role[]"  name="permission_role[]" {{ $encontrado }} value="{{ $permission->id }}">
                            {{ $permission->name }}
                        </dl>
                    @empty

                    @endforelse
                    {{-- @can('permission-role.guardar') --}}
                    <div class="row container-fluid text-center">
                        <button type="submit" class="btn btn-success" onclick="guardarPermisoRole()">
                            <i class="fas fa-save"></i> Guardar
                        </button>
                    </div>
                    {{-- @endcan --}}
                </div>
            </form>
        </div>
    </div>
</div>

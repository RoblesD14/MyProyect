@extends('layouts.master-layout')

@section('template_title')
    Permisos Por Role
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            <h5 class="m-0 font-weight-bold text-primary">Permisos / Roles</h5>
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card"  style="border:1px solid #4fc6e1 !important">
                                <div class="card-header bg-info py-2 text-white">
                                    <h5 class="card-title mb-0 text-white">ROLES</h5>
                                </div>
                                <div id="cardCollpase6" >
                                    <div class="card-body">
                                        <select name="role_id" id="role_id" class="form-control"
                                            onchange="listarPermissionRoles(this.value)">
                                            <option value="">-SELECCIONAR-</option>
                                            @foreach ($roles as $role)
                                               <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9" id="div-permission-role">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card border-left-primary">
                                        <div class="card-body">
                                            Seleccione un Rol para asignar algún Permiso
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- @include('sistema.permission-role.permissions') --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ asset('js/permission-role.js')}}"></script>
@endsection

<div class="box box-info padding-1">
    <div class="box-body">
        {!! Form::hidden('id', ($role) ? $role->id : null,['id' =>'id']) !!}
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label font-weight-bold">Nombre:</label>
            <div class="col-md-6">
                {!! Form::text('name',($role)? $role->name : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('name') ? ' is-invalid' : ''),
                    'id' => 'name','placeholder' => 'Nombre de Rol']) !!}
                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="box-footer mt20">
            @if (!$mostrar)
            <button type="submit" class="btn btn-success mr-3">
                <i class="fas fa-save"></i>
                Guardar
            </button>
            @endif
            <a class="btn btn-primary" href="{{ url('roles/') }}">Regresar</a>
        </div>
    </div>
</div>

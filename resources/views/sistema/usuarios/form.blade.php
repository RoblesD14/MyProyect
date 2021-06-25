<div class="box box-info padding-1">
    <div class="box-body">
        {!! Form::hidden('id', ($user) ? $user->id : null,['id' =>'id']) !!}
        <div class="form-group row">
            <label for="name" class="col-md-2 col-form-label font-weight-bold">Nombre:</label>
            <div class="col-md-6">
                {!! Form::text('name',($user)? $user->name : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('name') ? ' is-invalid' : ''),
                    'id' => 'name','placeholder' => 'Nombre de Usuario']) !!}
                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label font-weight-bold">Correo Electr&oacute;nico:</label>
            <div class="col-md-6">
                {!! Form::email('email',($user)? $user->email : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('email') ? ' is-invalid' : ''),
                    'id' => 'email','placeholder' => 'Correo Electrónico']) !!}
                {!! $errors->first('name', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        @if($mostrar == 'nuevo')
        <div class="form-group row" >
            <label for="email" class="col-md-2 col-form-label font-weight-bold">Contraseña:</label>
            <div class="col-md-6">
                {!! Form::password('password',[
                    'class' => 'form-control form-control-sm'. ($errors->has('password') ? ' is-invalid' : ''),
                    'id' => 'email','placeholder' => 'Contraseña']) !!}
                {!! $errors->first('password', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-2 col-form-label font-weight-bold">Repite Contraseña:</label>
            <div class="col-md-6">
                {!! Form::password('password_confirmation',[
                    'class' => 'form-control form-control-sm'. ($errors->has('password_confirmation') ? ' is-invalid' : ''),
                    'id' => 'password_confirmation','placeholder' => 'Repite Contraseña']) !!}
                {!! $errors->first('password_confirmation', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        @endif
        @if($mostrar=='nuevo')
        <div class="form-group row">
            <label for="categoria_id" class="col-md-2 col-form-label font-weight-bold">Rol:</label>
            <div class="col-md-3">
                {!! Form::select('role_id',$roles, null, [
                    'class' => 'form-control form-control-sm' . ($errors->has('role_id') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccionar']) !!}
                {!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        @else
        <div class="form-group row">
            <label for="role_id" class="col-md-2 col-form-label font-weight-bold">Rol:</label>
            <div class="col-md-3">
                {!! Form::select('role_id', $roles,is_array($user->roles) ? $user->roles[0]->id : null, [
                    'class' => 'form-control form-control-sm' . ($errors->has('role_id') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccionar']) !!}
                {!! $errors->first('role_id', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        @endif
        <div class="box-footer mt20">
            @if ($mostrar == 'nuevo' || $mostrar == 'editar')
            <button type="submit" class="btn btn-success mr-3">
                <i class="fas fa-save"></i>
                Guardar
            </button>
            @endif
            <a class="btn btn-primary" href="{{ url('users/') }}">Regresar</a>
        </div>
    </div>
</div>

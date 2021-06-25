<div class="box box-info padding-1">
    <div class="box-body">
        {!! Form::hidden('id', ($servicio) ? $servicio->id : null,['id' =>'id']) !!}
        <div class="form-group row">
            <label for="categoria_id" class="col-md-2 col-form-label font-weight-bold">Categor&iacute;a:</label>
            <div class="col-md-3">
                {!! Form::select('categoria_id', $categorias,($servicio)? $servicio->categoria_id : null, [
                    'class' => 'form-control form-control-sm' . ($errors->has('categoria_id') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccionar']) !!}
                {!! $errors->first('categoria_id', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <label for="fservicio" class="col-md-2 col-form-label font-weight-bold">Fecha:</label>
            <div class="col-md-2">
                {!! Form::date('fservicio', ($servicio->fservicio)? \Carbon\Carbon::parse($servicio->fservicio)->format('Y-m-d') : null, [
                    'class' => 'form-control form-control-sm'. ($errors->has('fservicio') ? ' is-invalid' : '')])
                !!}
                {!! $errors->first('fservicio', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="descripcion" class="col-md-2 col-form-label font-weight-bold">Descripci&oacute;n</label>
            <div class="col-md-6">
                {!! Form::text('descripcion',($servicio)? $servicio->descripcion : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('descripcion') ? ' is-invalid' : ''),
                    'id' => 'descripcion','placeholder' => 'Descripción del Servicio']) !!}
                {!! $errors->first('descripcion', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="cliente_id" class="col-md-2 col-form-label font-weight-bold">Cliente:</label>
            <div class="col-md-4">
                {!! Form::select('cliente_id', $clientes,($servicio)? $servicio->cliente_id : null, [
                    'class' => 'form-control form-control-sm'. ($errors->has('cliente_id') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccionar']) !!}
                {!! $errors->first('cliente_id', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="empleado_id" class="col-md-2 col-form-label font-weight-bold">Empleado:</label>
            <div class="col-md-4">
                {!! Form::select('empleado_id', $empleados,($servicio)? $servicio->empleado_id : null, [
                    'class' => 'form-control form-control-sm'. ($errors->has('empleado_id') ? ' is-invalid' : ''),
                    'placeholder' => 'Seleccionar']) !!}
                {!! $errors->first('empleado_id', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="monto" class="col-md-2 col-form-label font-weight-bold">Monto:</label>
            <div class="col-md-3">
                {!! Form::text('monto',($servicio)? $servicio->monto : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('monto') ? ' is-invalid' : ''),
                    'id' => 'monto','placeholder' => 'Ingrese Monto',
                    'maxlength' => 16])
                !!}
                {!! $errors->first('monto', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <label for="formapago" class="col-md-2 col-form-label font-weight-bold font-sm">FormaPago:</label>
            <div class="col-md-2">
                {!! Form::text('formapago',($servicio)? $servicio->formapago : null,[
                    'class' => 'form-control form-control-sm'. ($errors->has('formapago') ? ' is-invalid' : ''),
                    'id' => 'formapago','placeholder' => 'Ingrese Forma de Pago'])
                !!}
                {!! $errors->first('formapago', '<span class="invalid-feedback">:message</span>') !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="fpago" class="col-md-2 col-form-label font-weight-bold font-sm">FechaPago:</label>
            <div class="col-md-2">
                {!! Form::date('fpago', ($servicio->fpago)? \Carbon\Carbon::parse($servicio->fpago)->format('Y-m-d') : null, [
                    'class' => 'form-control form-control-sm'. ($errors->has('fpago') ? ' is-invalid' : '')]) !!}
                {!! $errors->first('fpago', '<span class="invalid-feedback">:message</span>') !!}
            </div>
            <label for="estado" class="col-md-4 col-form-label font-weight-bold font-sm">
                Estado:
                {!! Form::checkbox('estado',($servicio->estado) ? 1 : 0, ($servicio->estado? true: false),); !!}
            </label>
        </div>
        <div class="box-footer mt20">
            @if (!$mostrar)
            <button type="submit" class="btn btn-success mr-3">
                <i class="fa fa-save"></i>
                Guardar
            </button>
            @endif
            <a class="btn btn-primary" href="{{ url('servicios/') }}">Regresar</a>
        </div>
    </div>
</div>

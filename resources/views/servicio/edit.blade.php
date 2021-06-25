@extends('layouts.master-layout')

@section('template_title')
    Actualizar Servicio
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Editar Servicio</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('servicios.update', $servicio->id) }}"  role="form" >
                        {{ method_field('PATCH') }}
                        @csrf

                        @include('servicio.form')

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

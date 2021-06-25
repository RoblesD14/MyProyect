@extends('layouts.master-layout')

@section('template_title')
    Editar Usuarios
@endsection

@section('content')
<section class="content container-fluid">
    <div class="">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Editar usuarios</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}"  role="form" >
                        {{ method_field('PATCH') }}
                        @csrf
                        @include('sistema.usuarios.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

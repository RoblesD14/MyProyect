@extends('layouts.master-layout')

@section('template_title')
    Mostrar Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <h5 class="m-0 font-weight-bold text-primary">Mostrar Rol</h5>
                        </span>
                    </div>
                    <div class="card-body">
                        {{-- <form method="POST" action="{{ route('servicios.store') }}"  role="form" > --}}
                            {{-- @csrf --}}

                            @include('sistema.roles.form')

                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

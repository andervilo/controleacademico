@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Coordenadores
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'coordenadores.store']) !!}
                        @include('pessoas.fields')
                        @include('coordenadores.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

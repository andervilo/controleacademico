@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turma Recurso
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'turmaRecursos.store']) !!}

                        @include('turma_recursos.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turma Sala
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('turma_salas.show_fields')
                    <a href="{!! route('turmaSalas.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection

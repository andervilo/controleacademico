@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Cursos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="col-md-12" style="padding-left: 20px">
                    @include('cursos.show_fields')
                    <a href="{!! route('cursos.index') !!}" class="btn btn-danger"><b>Voltar</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection

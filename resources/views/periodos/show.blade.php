@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Periodos
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('periodos.show_fields')
                    <a href="{!! route('periodos.index') !!}" class="btn btn-danger"><b>Voltar</b></a>
                </div>
            </div>
        </div>
    </div>
@endsection

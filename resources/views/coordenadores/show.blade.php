@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">
            Coordenador: {!! $coordenadores->pessoa->nome !!}
        </h1>
        <h1 class="pull-right">
           <a href="{!! route('coordenadores.index') !!}" class="btn btn-danger pull-right" style="margin-top: -10px;margin-bottom: 5px"><b>Voltar</b></a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('coordenadores.show_fields')
                    <div class="col-md-12">
                        <a href="{!! route('coordenadores.index') !!}" class="btn btn-danger">
                            <b>Voltar</b>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection

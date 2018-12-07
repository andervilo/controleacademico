@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Coordenadores</h1>
        <h1 class="pull-right">
        	@include('partials.personFilter')
        	
           <a class="btn btn-primary pull-right"  href="{!! route('coordenadores.create') !!}"><i class="fa fa-plus"></i> Novo</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('coordenadores.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


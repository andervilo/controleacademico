@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Professores</h1>
        <div class="pull-right">
            <form method="get" style="display:inline-block;width: 400px;" action="{!! route('professores.index') !!}">
            	
                <div class="input-group">
                    <input type="text" name="q" value="" class="form-control input pull-right" placeholder="Buscar por Nome, Id Funcional, RG, CPF ou E-mail">
                    
                    <div class="input-group-btn">
                        <button type="submit" class="btn  btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>  
            <a class="btn btn-success pull-right"  href="{!! route('professores.create') !!}"><i class="fa fa-plus"></i> Novo</a>         
        </div>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('professores.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection


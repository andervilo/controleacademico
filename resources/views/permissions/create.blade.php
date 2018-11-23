@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
                <h1><i class='fa fa-key'></i> Add Permission</h1>
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                        <div class='col-lg-4 col-lg-offset-4'>
                                {{ Form::open(array('url' => 'permissions')) }}

                                <div class="form-group">
                                    {{ Form::label('name', 'Nome Permissão') }}
                                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                                </div>

                                {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }}
                                <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
                                {{ Form::close() }}

                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection

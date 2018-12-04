
@extends('layouts.app')

@section('title', '| Add User')

@section('content')


        <section class="content-header">
            <h1>
                    <h1><i class='fa fa-user-plus'></i> Novo Usuário</h1>
            </h1>
        </section>
            <div class="content">
                <div class="box box-primary">

                    <div class="box-body">
                        <div class="row">



    <div class='col-lg-6 col-lg-offset-3'>
    {{ Form::open(array('url' => 'users')) }}

    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

    </div>

    {{ Form::submit('Adicionar', array('class' => 'btn btn-primary')) }}
    <a href="{{ route('users.index') }}" class="btn btn-danger">Cancelar</a>
    {{ Form::close() }}


    </div>
</div>
</div>
</div>
</div>

@endsection

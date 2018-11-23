@extends('layouts.app')
@section('title', '| Users')
@section('content')

    <section class="content-header">
        <h1>
            <i class="fa fa-users"></i> Administração de Usuários
            <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
            <a href="{{ route('users.create') }}" class="btn btn-success pull-right">Novo Usuário</a>
        </h1>
    </section>
    <div class="content">
            <div class="clearfix"></div>
            <div class="clearfix"></div>
            <div class="box box-primary">
                <div class="box-body">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-condensed">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Cadastro</th>
                    <th>Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d/m/Y')  }}</td>
                    <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-sm btn-danger']) !!}
                            {!! Form::close() !!}

                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

            <a href="{{ route('users.create') }}" class="btn btn-success">Novo Usuário</a>

            </div>
        </div>
    </div>



@endsection


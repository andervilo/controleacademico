@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1><i class="fa fa-key"></i> Roles
            <a href="{{ route('roles.create') }}" class="btn btn-success pull-right">Nova Role</a>
            <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
            <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Role</th>
                                <th>Permissões</th>
                                <th>Operation</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($roles as $role)
                            <tr>

                                <td>{{ $role->name }}</td>

                                <td>
                                    @foreach ($role->permissions()->pluck('name') as $name)
                                <span class="label label-warning">{{ $name }}</span>
                                    @endforeach
                                </td>

                                <td>
                                <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-sm btn-info pull-left" style="margin-right: 3px;">Editar</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                {!! Form::submit('Excluir', ['class' => 'btn btn-sm btn-danger']) !!}
                                {!! Form::close() !!}

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Nova Role</a>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


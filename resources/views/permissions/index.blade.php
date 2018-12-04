@extends('layouts.app')

@section('content')
    <section class="content-header">
            <h1><i class="fa fa-key"></i> Permissões Disponíveis

                <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
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
                                        <th>Permissões</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>
                                        <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-xs btn-info pull-left" style="margin-right: 3px;">Editar</a>

                                        {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                        {!! Form::submit('Excluir', ['class' => 'btn btn-xs btn-danger']) !!}
                                        {!! Form::close() !!}

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Nova Permissão</a>
            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection


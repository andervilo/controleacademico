@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                <div class='col-lg-6 col-lg-offset-3'>

                    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Role Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <h5><b>Setar Permissões</b></h5>
                    @foreach ($permissions as $permission)

                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                    @endforeach
                    <br>
                    {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
                    <a href="{{ route('roles.index') }}" class="btn btn-danger">Cancelar</a>
                    {{ Form::close() }}
                </div>

               </div>
           </div>
       </div>
   </div>
@endsection

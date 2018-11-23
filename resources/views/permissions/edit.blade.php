@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            <h1><i class='fa fa-key'></i> Editar Permissão</h1>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                    <div class='col-lg-4 col-lg-offset-4'>

                            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}


                            <div class="form-group">
                                    {{ Form::label('name', 'Nome Permissão') }}
                                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                                </div>


                            {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
                            <a href="{{ route('permissions.index') }}" class="btn btn-danger">Cancelar</a>
                            {{ Form::close() }}

                    </div>
               </div>
           </div>
       </div>
   </div>
@endsection

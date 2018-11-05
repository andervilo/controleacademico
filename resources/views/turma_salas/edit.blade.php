@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turma Sala
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($turmaSala, ['route' => ['turmaSalas.update', $turmaSala->id], 'method' => 'patch']) !!}

                        @include('turma_salas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
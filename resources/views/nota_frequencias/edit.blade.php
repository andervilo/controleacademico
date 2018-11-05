@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editar Aluno Turma
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($notaFrequencia, ['route' => ['notaFrequencias.update', $notaFrequencia->id], 'method' => 'patch']) !!}

                        @include('nota_frequencias.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
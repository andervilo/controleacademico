@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Diretores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($dados, ['route' => ['diretores.update', $dados->id], 'method' => 'patch']) !!}
                        @include('pessoas.fields')
                        @include('diretores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
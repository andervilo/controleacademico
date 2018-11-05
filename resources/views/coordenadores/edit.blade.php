@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Coordenadores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   @php
                    $dados = $coordenadores;
                   @endphp
                   {!! Form::model($coordenadores, ['route' => ['coordenadores.update', $coordenadores->id], 'method' => 'patch']) !!}
                        @include('pessoas.fields')
                        @include('coordenadores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
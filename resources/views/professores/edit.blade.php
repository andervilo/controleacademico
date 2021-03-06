@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Professores
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   @php
                    $dados = $professores;
                   @endphp
                   {!! Form::model($professores, ['route' => ['professores.update', $professores->id], 'method' => 'patch']) !!}
                        @include('pessoas.fields')
                        @include('professores.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
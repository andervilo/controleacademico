@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Turmas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($turmas, ['route' => ['turmas.update', $turmas->id], 'method' => 'patch']) !!}

                        @include('turmas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
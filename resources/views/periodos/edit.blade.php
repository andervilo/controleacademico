@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Periodos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($periodos, ['route' => ['periodos.update', $periodos->id], 'method' => 'patch']) !!}

                        @include('periodos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
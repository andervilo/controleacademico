@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recursos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($recursos, ['route' => ['recursos.update', $recursos->id], 'method' => 'patch']) !!}

                        @include('recursos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
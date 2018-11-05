@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Pessoas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pessoas, ['route' => ['pessoas.update', $pessoas->id], 'method' => 'patch']) !!}

                        @include('pessoas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
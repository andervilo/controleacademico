@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Curso Professor
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($cursoProfessor, ['route' => ['cursoProfessors.update', $cursoProfessor->id], 'method' => 'patch']) !!}

                        @include('curso_professors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
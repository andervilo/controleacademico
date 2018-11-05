@extends('layouts.app')

@section('content')
@include('flash::message')
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
                    {!! Form::open(['route' => 'cursoProfessors.store']) !!}

                        @include('curso_professors.fields')

                    {!! Form::close() !!}
                </div>
<!--            </div>
        </div>
    </div>

<div class="content">
        <div class="box box-primary">
            <div class="box-body">-->
<table class="table table-responsive" id="cursoProfessors-table">
    <thead>
        <tr>
<!--            <th>Curso</th>-->
        <th>Professor</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($curprof as $cp)
        <tr>
<!--            <td>{!! $cp->cursos->nome !!}</td>-->
            <td>{!! $cp->professores->fullname !!}</td>
            <td>
                {!! Form::open(['route' => ['cursoProfessors.destroy', $cp->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
<!--                    <a href="{!! route('cursoProfessors.show', [$cp->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cursoProfessors.edit', [$cp->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('cursoProfessors.create', [$cp->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus"></i></a>-->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
        </div>
    </div>
</div>
@endsection

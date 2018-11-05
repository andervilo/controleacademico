<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', 'Curso:') !!}
    {!! Form::select('curso_id', $cursos, null, ['class' => 'form-control']) !!}
</div>

<!-- Professor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('professor_id', 'Professor:') !!}
    {!! Form::select('professor_id', $prof, null, ['class' => 'form-control']) !!}
</div>

<!-- Identificador Field -->
<div class="form-group col-sm-6">
    {!! Form::label('identificador', 'Identificador:') !!}
    {!! Form::text('identificador', null, ['class' => 'form-control']) !!}
</div>

@include('turma_salas.fields')
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('turmas/curso',[$curso_id]) !!}" class="btn btn-default">Cancelar</a>
</div>

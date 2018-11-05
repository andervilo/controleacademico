<!-- Turma Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('turma_id', 'Turma:') !!}
    {!! Form::select('turma_id', $turma, null, ['class' => 'form-control']) !!}
</div>

<!-- Aluno Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('aluno_id', 'Aluno:') !!}
    {!! Form::select('aluno_id', $alunos, null, ['class' => 'form-control']) !!}
</div>

<!-- Frequencia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('frequencia', 'Frequência:') !!}
    {!! Form::number('frequencia', null, ['class' => 'form-control']) !!}
</div>

<!-- Nota Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nota', 'Nota:') !!}
    {!! Form::number('nota', null, ['class' => 'form-control']) !!}
</div>

<!-- Situacao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('situacao', 'Situação:') !!}
    {!! Form::select('situacao', $situacao, null, ['class' => 'form-control']) !!}
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('notaFrequencias/turma',[$turma_id]) !!}" class="btn btn-default">Cancel</a>
</div>

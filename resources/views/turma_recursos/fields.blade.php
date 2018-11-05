<!-- Recurso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recurso_id', 'Recurso:') !!}
    {!! Form::select('recurso_id', $recursos, null, ['class' => 'form-control']) !!}
</div>

<!-- Turma Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('turma_id', 'Turma Id:') !!}
    {!! Form::select('turma_id', $turma, null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! url('turmaRecursos/turma',[$turma_id]) !!}" class="btn btn-default">Cancel</a>
</div>

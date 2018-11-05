

<!-- Matricula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('matricula', 'Matricula:') !!}
    {!! Form::text('matricula', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('alunos.index') !!}" class="btn btn-default">Cancel</a>
</div>

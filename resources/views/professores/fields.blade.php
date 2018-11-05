<!-- Id Funcional Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_funcional', 'Id Funcional:') !!}
    {!! Form::text('id_funcional', null, ['class' => 'form-control']) !!}
</div>

<!-- Salario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('salario', 'Salario:') !!}
    {!! Form::text('salario', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('professores.index') !!}" class="btn btn-default">Cancel</a>
</div>

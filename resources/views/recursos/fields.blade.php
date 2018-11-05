<!-- Descricao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descricao', 'Descricao:') !!}
    {!! Form::text('descricao', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Patrimonial Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_patrimonial', 'Id Patrimonial:') !!}
    {!! Form::number('id_patrimonial', null, ['class' => 'form-control']) !!}
</div>

<!-- Data Aquisicao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('data_aquisicao', 'Data Aquisicao:') !!}
    {!! Form::date('data_aquisicao', null, ['class' => 'form-control']) !!}
</div>

<!-- Valor Aquisicao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('valor_aquisicao', 'Valor Aquisicao:') !!}
    {!! Form::number('valor_aquisicao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('recursos.index') !!}" class="btn btn-default">Cancel</a>
</div>

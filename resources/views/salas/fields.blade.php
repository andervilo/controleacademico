<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::number('numero', null, ['class' => 'form-control']) !!}
</div>

<!-- Capacidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('capacidade', 'Capacidade:') !!}
    {!! Form::number('capacidade', null, ['class' => 'form-control']) !!}
</div>

<!-- Setor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('setor', 'Setor:') !!}
    {!! Form::text('setor', null, ['class' => 'form-control']) !!}
</div>

<!-- Andar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('andar', 'Andar:') !!}
    {!! Form::number('andar', null, ['class' => 'form-control']) !!}
</div>

<!-- Corredor Field -->
<div class="form-group col-sm-6">
    {!! Form::label('corredor', 'Corredor:') !!}
    {!! Form::number('corredor', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('salas.index') !!}" class="btn btn-default">Cancel</a>
</div>

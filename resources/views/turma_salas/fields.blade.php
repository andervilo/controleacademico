<!-- Turma Id Field -->
<!--<div class="form-group col-sm-6">
    {!! Form::label('turma_id', 'Turma Id:') !!}
    {!! Form::number('turma_id', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Sala Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sala_id', 'Sala:') !!}
    {!! Form::select('sala_id', $salas, null, ['class' => 'form-control']) !!}
</div>

<!-- Dia Semana Field -->
<!--<div class="form-group col-sm-6">
    @php
        $dia_semana = [
            'Domingo'=>'Domingo',
            'Segunda'=>'Segunda',
            'Terça'=>'Terça',
            'Quarta'=>'Quarta',
            'Quinta'=>'Quinta',
            'Sexta'=>'Sexta',
            'Sábado'=>'Sábado'
            
        ];
    @endphp
    {!! Form::label('dia_semana', 'Dia Semana:') !!}
    {!! Form::select('dia_semana',$dia_semana, null, ['placeholder' => 'Dia da Semana...','class' => 'form-control']) !!}
</div>-->

<!-- Hora Inicio Field -->
<!--<div class="form-group col-sm-3">
    {!! Form::label('hora_inicio', 'Hora Inicio:') !!}
    {!! Form::time('hora_inicio', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Hora Fim Field -->
<!--<div class="form-group col-sm-3">
    {!! Form::label('hora_fim', 'Hora Fim:') !!}
    {!! Form::time('hora_fim', null, ['class' => 'form-control']) !!}
</div>-->

<!-- Submit Field -->
<!--<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('turmaSalas.index') !!}" class="btn btn-default">Cancel</a>
</div>-->

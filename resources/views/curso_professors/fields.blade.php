<!-- Curso Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('curso_id', 'Curso:') !!}
    <!--{!! Form::number('curso_id', null, ['class' => 'form-control']) !!}-->
    {!! Form::select('curso_id',$cursos, $selectId, ['class' => 'form-control']) !!}
</div>

<!-- Professor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('professor_id', 'Professor:') !!}
    <!--{!! Form::number('professor_id', null, ['class' => 'form-control']) !!}-->
    {!! Form::select('professor_id',$professores, null, ['placeholder' => 'Escolha um Professor...','class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Salvar', ['class' => 'btn btn-primary']) !!}
    <!--<a href="{!! route('cursoProfessors.index') !!}" class="btn btn-default">Cancel</a>-->
</div>

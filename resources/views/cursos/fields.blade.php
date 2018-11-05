<div class="col-md-6">
    <!-- Nome Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('nome', 'Nome Curso:') !!}
        {!! Form::text('nome', null, ['class' => 'form-control']) !!}
    </div>
    
    <!-- Cargahoraria Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('cargahoraria', 'Carga Horaria:') !!}
        {!! Form::number('cargahoraria', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Periodo Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('periodo_id', 'Período:') !!}
        {!! Form::select('periodo_id',$periodos, null, ['placeholder' => 'Escolha um Período...','class' => 'form-control']) !!}
    </div>

    <!-- Coordenador Id Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('coordenador_id', 'Coordenador:') !!}
        {!! Form::select('coordenador_id',$coordenadores, null, ['placeholder' => 'Escolha um Período...','class' => 'form-control']) !!}
    </div>

    <!-- Descricao Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('descricao', 'Descricao:') !!}
        {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}
    </div>

    

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('cursos.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>

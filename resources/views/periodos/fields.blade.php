<!-- Escola Id Field -->
<div class="form-group col-sm-6">
    <div class="form-group col-sm-12">
        {!! Form::label('escola_id', 'Escola:') !!}
        {!! Form::select('escola_id', $escolas, null, ['class' => 'form-control','placeholder' => 'Selecione uma Escola...']) !!}
    </div>

    <!-- Ano Field -->
    <div class="form-group col-sm-3">
        {!! Form::label('ano', 'Ano:') !!}
        {!! Form::text('ano', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Anual Field -->
    <div class="form-group col-sm-12">    
        <label class="radio-inline">
            <!--{!! Form::hidden('anual', false) !!}-->
            {!! Form::radio('tipoperiodo', '1', null) !!} {!! Form::label('anual', 'Anual') !!}
        </label>

    </div>

    <!-- Semestre1 Field -->
    <div class="form-group col-sm-12">    
        <label class="radio-inline">
            <!--{!! Form::hidden('semestre1', false) !!}-->
            {!! Form::radio('tipoperiodo', '2', null) !!} {!! Form::label('semestre1', '1º Semestre') !!}
        </label>
    </div>

    <!-- Semestre2 Field -->
    <div class="form-group col-sm-12">    
        <label class="radio-inline">
            <!--{!! Form::hidden('semestre2', false) !!}-->
            {!! Form::radio('tipoperiodo', '3', null) !!} {!! Form::label('semestre2', '2º Semestre') !!}
        </label>
    </div>

    <!-- Submit Field -->
    <div class="form-group col-sm-12">
        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
        <a href="{!! route('periodos.index') !!}" class="btn btn-default">Cancel</a>
    </div>
</div>

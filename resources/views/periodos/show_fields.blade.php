<table class="table table-condensed table-hover table-striped">
<!-- Id Field -->
<tr><td width='10%'>
    {!! Form::label('id', 'Id:') !!}</td><td>
    {!! $periodos->id !!}
</td></tr>

<!-- Escola Id Field -->
<tr><td>
    {!! Form::label('escola_id', 'Escola:') !!}</td><td>
    {!! $periodos->escola->nome!!}
</td></tr>

<!-- Ano Field -->
<tr><td>
    {!! Form::label('ano', 'Ano:') !!}</td><td>
    {!! $periodos->ano !!}
</td></tr>

<!-- Anual Field -->
<tr><td>
    {!! Form::label('anual', 'Anual:') !!}</td><td>
    {!! $periodos->anual ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!}
    
</td></tr>

<!-- Semestre1 Field -->
<tr><td>
    {!! Form::label('semestre1', 'Semestre1:') !!}</td><td>
    {!! $periodos->semestre1 ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!}
    
</td></tr>

<!-- Semestre2 Field -->
<tr><td>
    {!! Form::label('semestre2', 'Semestre2:') !!}</td><td>
    {!! $periodos->semestre2 ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!}
    
</td></tr>

<!-- Created At Field -->
<tr><td>
    {!! Form::label('created_at', 'Created At:') !!}</td><td>
    {!! $periodos->created_at !!}
</td></tr>

<!-- Updated At Field -->
<tr><td>
    {!! Form::label('updated_at', 'Updated At:') !!}</td><td>
    {!! $periodos->updated_at !!}
</td></tr>

<!-- Deleted At Field -->
<tr><td>
    {!! Form::label('deleted_at', 'Deleted At:') !!}</td><td>
    {!! $periodos->deleted_at !!}
</td></tr>
</table>

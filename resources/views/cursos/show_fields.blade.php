<table class=" table table-condensed table-striped table-hover">
<!-- Id Field -->
<tr><td width="10%">
    {!! Form::label('id', 'Id:') !!}</td><td>
    {!! $cursos->id !!}
</td></tr>

<!-- Nome Field -->
<tr><td>
    {!! Form::label('nome', 'Nome:') !!}</td><td>
    {!! $cursos->nome !!}
</td></tr>

<!-- Periodo Id Field -->
<tr><td>
    {!! Form::label('periodo_id', 'Escola/Período:') !!}</td><td>
    {!! $cursos->label_periodo !!}
</td></tr>

<!-- Coordenador Id Field -->
<tr><td>
    {!! Form::label('coordenador_id', 'Coordenador:') !!}</td><td>
    {!! $cursos->nome_coordenador !!}
</td></tr>

<!-- Descricao Field -->
<tr><td>
    {!! Form::label('descricao', 'Descrição:') !!}</td><td>
    {!! $cursos->descricao !!}
</td></tr>

<!-- Cargahoraria Field -->
<tr><td>
    {!! Form::label('cargahoraria', 'Cargahoraria:') !!}</td><td>
    {!! $cursos->cargahoraria !!} horas
</td></tr>

<!-- Created At Field -->
<tr><td>
    {!! Form::label('created_at', 'Created At:') !!}</td><td>
    {!! $cursos->created_at !!}
</td></tr>

<!-- Updated At Field -->
<tr><td>
    {!! Form::label('updated_at', 'Updated At:') !!}</td><td>
    {!! $cursos->updated_at !!}
</td></tr>

<!-- Deleted At Field -->
<tr><td>
    {!! Form::label('deleted_at', 'Deleted At:') !!}</td><td>
    {!! $cursos->deleted_at !!}
</td></tr>
</table>

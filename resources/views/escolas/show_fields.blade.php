<div class="col-md-12">
<table class=" table table-striped table-condensed table-hover">
<!-- Id Field -->
<tr><td class="col-md-2">
    {!! Form::label('id', 'Id:') !!}
    </td><td>
    {!! $escolas->id !!}
</td></tr>

<!-- Nome Field -->
<tr><td>
    {!! Form::label('nome', 'Nome:') !!}
    </td><td>
    {!! $escolas->nome !!}
</td></tr>

<!-- Endereco Field -->
<tr><td>
    {!! Form::label('endereco', 'Endereco:') !!}
    </td><td>
    {!! $escolas->endereco !!}
</td></tr>

<!-- Numero Field -->
<tr><td>
    {!! Form::label('numero', 'Numero:') !!}
    </td><td>
    {!! $escolas->numero !!}
</td></tr>

<!-- Bairro Field -->
<tr><td>
    {!! Form::label('bairro', 'Bairro:') !!}
    </td><td>
    {!! $escolas->bairro !!}
</td></tr>

<!-- Cidade Field -->
<tr><td>
    {!! Form::label('cidade', 'Cidade:') !!}
    </td><td>
    {!! $escolas->cidade !!}
</td></tr>

<!-- Estado Field -->
<tr><td>
    {!! Form::label('estado', 'Estado:') !!}
    </td><td>
    {!! $escolas->estado !!}
</td></tr>

<!-- Cep Field -->
<tr><td>
    {!! Form::label('cep', 'Cep:') !!}
    </td><td>
    {!! $escolas->cep !!}
</td></tr>

<!-- Diretor Id Field -->
<tr><td>
    {!! Form::label('diretor_id', 'Diretor:') !!}
    </td><td>
    {!! $escolas->diretor->pessoa->nome !!}
</td></tr>

<!-- Created At Field -->
<tr>
    <td>
    {!! Form::label('created_at', 'Criado em:') !!}
    </td><td>
    {!! $escolas->created_at->format('d/m/Y h:m:s') !!}
</td>
</tr>

<!-- Updated At Field -->
<tr>
    <td>{!! Form::label('updated_at', 'Atualizado em:') !!}</td>
    <td>{!! $escolas->updated_at->format('d/m/Y h:m:s') !!}</td>
</tr>
</table>
</div>
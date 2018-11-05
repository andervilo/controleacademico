<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $pessoas->id !!}</p>
</div>

<!-- Nome Field -->
<div class="form-group">
    {!! Form::label('nome', 'Nome:') !!}
    <p>{!! $pessoas->nome !!}</p>
</div>

<!-- Cpf Field -->
<div class="form-group">
    {!! Form::label('cpf', 'Cpf:') !!}
    <p>{!! $pessoas->cpf !!}</p>
</div>

<!-- Rg Field -->
<div class="form-group">
    {!! Form::label('rg', 'Rg:') !!}
    <p>{!! $pessoas->rg !!}</p>
</div>

<!-- Endereco Field -->
<div class="form-group">
    {!! Form::label('endereco', 'Endereco:') !!}
    <p>{!! $pessoas->endereco !!}</p>
</div>

<!-- Numero Field -->
<div class="form-group">
    {!! Form::label('numero', 'Numero:') !!}
    <p>{!! $pessoas->numero !!}</p>
</div>

<!-- Bairro Field -->
<div class="form-group">
    {!! Form::label('bairro', 'Bairro:') !!}
    <p>{!! $pessoas->bairro !!}</p>
</div>

<!-- Cidade Field -->
<div class="form-group">
    {!! Form::label('cidade', 'Cidade:') !!}
    <p>{!! $pessoas->cidade !!}</p>
</div>

<!-- Estado Field -->
<div class="form-group">
    {!! Form::label('estado', 'Estado:') !!}
    <p>{!! $pessoas->estado !!}</p>
</div>

<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'Cep:') !!}
    <p>{!! $pessoas->cep !!}</p>
</div>

<!-- Telefone Field -->
<div class="form-group">
    {!! Form::label('telefone', 'Telefone:') !!}
    <p>{!! $pessoas->telefone !!}</p>
</div>

<!-- Celular Field -->
<div class="form-group">
    <tr>
        <td>{!! Form::label('celular', 'Celular:') !!}</td>
        <td>{!! $pessoas->celular !!}</td>
    </tr>


</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    <p>{!! $pessoas->email !!}</p>
</div>

<!-- Dt Nasc Field -->
<div class="form-group">
    {!! Form::label('dt_nasc', 'Data de Nascimento:') !!}
    <p>{!! $pessoas->dt_nasc->format('d/m/Y')  !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Criado em:') !!}
    <p>{!! $pessoas->created_at->format('d/m/Y H:m:s')  !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Atualizado em:') !!}
    <p>{!! $pessoas->updated_at->format('d/m/Y H:m:s') !!}</p>
</div>


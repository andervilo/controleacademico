@if(isset($dados['pessoa']))
    {!! Form::hidden('pessoa_id',$dados->pessoa->id, ['class' => 'form-control']) !!}
@else
    {!! Form::hidden('nome',null, ['class' => 'form-control']) !!}
@endif

<!-- Nome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nome', 'Nome:') !!}   
    
    @if(isset($dados['pessoa']))
        {!! Form::text('nome',$dados->pessoa->nome, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('nome',null, ['class' => 'form-control']) !!}
    @endif
    
    
</div>

<!-- Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cpf', 'CPF:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('cpf',$dados->pessoa->cpf, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('cpf', null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<!-- Rg Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rg', 'RG:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('rg',$dados->pessoa->rg, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('rg', null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<!-- Endereco Field -->
<div class="form-group col-sm-6">
    {!! Form::label('endereco', 'Endereco:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('endereco',$dados->pessoa->endereco, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('endereco', null, ['class' => 'form-control']) !!}
    @endif
    
</div>

<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('numero',$dados->pessoa->numero, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('numero', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Bairro Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bairro', 'Bairro:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('bairro',$dados->pessoa->bairro, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('bairro', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Cidade Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cidade', 'Cidade:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('cidade',$dados->pessoa->cidade, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('cidade', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Estado Field -->
<div class="form-group col-sm-6">
    @php
        $estados = [
            'AC'=>'Acre',
            'AL'=>'Alagoas',
            'AP'=>'Amapá',
            'AM'=>'Amazonas',
            'BA'=>'Bahia',
            'CE'=>'Ceará',
            'DF'=>'Distrito Federal',
            'ES'=>'Espírito Santo',
            'GO'=>'Goiás',
            'MA'=>'Maranhão',
            'MT'=>'Mato Grosso',
            'MS'=>'Mato Grosso do Sul',
            'MG'=>'Minas Gerais',
            'PA'=>'Pará',
            'PB'=>'Paraíba',
            'PR'=>'Paraná',
            'PE'=>'Pernambuco',
            'PI'=>'Piauí',
            'RJ'=>'Rio de Janeiro',
            'RN'=>'Rio Grande do Norte',
            'RS'=>'Rio Grande do Sul',
            'RO'=>'Rondônia',
            'RR'=>'Roraima',
            'SC'=>'Santa Catarina',
            'SP'=>'São Paulo',
            'SE'=>'Sergipe',
            'TO'=>'Tocantins'
        ];
    @endphp
    
    {!! Form::label('estado', 'Estado:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::select(
        'estado',
        $estados, 
        $dados->pessoa->estado, ['class' => 'form-control']) !!}
    @else
        {!! Form::select('estado', 
        $estados, 
        null, 
        ['placeholder' => 'Escolha um Estado...','class' => 'form-control']) !!}
    @endif
</div>

<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'Cep:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('cep',$dados->pessoa->cep, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('cep', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Telefone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telefone', 'Telefone:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('telefone',$dados->pessoa->telefone, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('telefone', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Celular Field -->
<div class="form-group col-sm-6">
    {!! Form::label('celular', 'Celular:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('celular',$dados->pessoa->celular, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('celular', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::text('email',$dados->pessoa->email, ['class' => 'form-control']) !!}
    @else
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Dt Nasc Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dt_nasc', 'Data Nascimento:') !!}
    @if(isset($dados['pessoa']))
        {!! Form::date('dt_nasc',$dados->pessoa->dt_nasc, ['class' => 'form-control']) !!}
    @else
        {!! Form::date('dt_nasc', null, ['class' => 'form-control']) !!}
    @endif
</div>

<!-- Submit Field -->
<!--<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('pessoas.index') !!}" class="btn btn-default">Cancel</a>
</div>-->

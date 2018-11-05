<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">
        <tr ><td width="30%">
            {!! Form::label('id', 'Id:') !!}
                    </td><td>
            {!! $diretores->id !!}
        </td></tr>

        <!-- Id Funcional Field -->
        <tr><td>
            {!! Form::label('id_funcional', 'Id Funcional:') !!}</td>
                    <td>
            {!! $diretores->id_funcional !!}
        </td></tr>

        <!-- Nome Field -->
        <tr><td>
            {!! Form::label('nome', 'Nome:') !!}</td>
                    <td>
            {!! $diretores->pessoa->nome !!}
        </td></tr>

        <!-- Cpf Field -->
        <tr><td>
            {!! Form::label('cpf', 'CPF:') !!}</td>
                    <td>
            {!! $diretores->pessoa->cpf !!}
        </td></tr>

        <!-- Rg Field -->
        <tr><td>
            {!! Form::label('rg', 'RG:') !!}</td>
                    <td>
            {!! $diretores->pessoa->rg !!}
        </td></tr>

        <!-- Endereco Field -->
        <tr><td>
            {!! Form::label('endereco', 'Endereco:') !!}</td>
                    <td>
            {!! $diretores->pessoa->endereco !!}
        </td></tr>

        <!-- Numero Field -->
        <tr><td>
            {!! Form::label('numero', 'Numero:') !!}</td>
                    <td>
            {!! $diretores->pessoa->numero !!}
        </td></tr>

        <!-- Bairro Field -->
        <tr><td>
            {!! Form::label('bairro', 'Bairro:') !!}</td>
                    <td>
            {!! $diretores->pessoa->bairro !!}
        </td></tr>

        <!-- Cidade Field -->
        <tr><td>
            {!! Form::label('cidade', 'Cidade:') !!}</td>
                    <td>
            {!! $diretores->pessoa->cidade !!}
        </td></tr>
    </table>
</div>

<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">	
            <!-- Estado Field -->
        <tr><td width="30%">
            {!! Form::label('estado', 'Estado:') !!}</td>
                        <td>
            {!! $diretores->pessoa->estado !!}
        </td></tr>

        <!-- Cep Field -->
        <tr><td>
            {!! Form::label('cep', 'Cep:') !!}</td>
                        <td>
            {!! $diretores->pessoa->cep !!}
        </td></tr>

        <!-- Telefone Field -->
        <tr><td>
            {!! Form::label('telefone', 'Telefone:') !!}</td>
                        <td>
            {!! $diretores->pessoa->telefone !!}
        </td></tr>

        <!-- Celular Field -->
        <tr>
                    <td>{!! Form::label('celular', 'Celular:') !!}</td>
                    <td>{!! $diretores->pessoa->celular !!}</td>
        </tr>

        <!-- Email Field -->
        <tr><td>
            {!! Form::label('email', 'Email:') !!}</td>
                        <td>
            {!! $diretores->pessoa->email !!}
        </td></tr>

        <!-- Dt Nasc Field -->
        <tr><td>
            {!! Form::label('dt_nasc', 'Data de Nascimento:') !!}</td>
                        <td>
            {!! $diretores->pessoa->dt_nasc->format('d/m/Y')  !!}
        </td></tr>

        <!-- Salario Field -->
        <tr><td>
            {!! Form::label('salario', 'Salario:') !!}</td>
                        <td>
            {!! $diretores->salario !!}
        </td></tr>

        <!-- Created At Field -->
        <tr><td>
            {!! Form::label('created_at', 'Created At:') !!}</td>
                        <td>
            {!! $diretores->created_at->format('d/m/Y h:m:s') !!}
        </td></tr>

        <!-- Updated At Field -->
        <tr><td>
            {!! Form::label('updated_at', 'Updated At:') !!}</td>
                        <td>
            {!! $diretores->updated_at->format('d/m/Y h:m:s') !!}
        </td></tr>
    </table>
</div>








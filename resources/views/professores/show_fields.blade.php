<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">
        <tr ><td width="30%">
            {!! Form::label('id', 'Id:') !!}
                    </td><td>
            {!! $professores->id !!}
        </td></tr>

        <!-- Id Funcional Field -->
        <tr><td>
            {!! Form::label('id_funcional', 'Id Funcional:') !!}</td>
                    <td>
            {!! $professores->id_funcional !!}
        </td></tr>

        <!-- Nome Field -->
        <tr><td>
            {!! Form::label('nome', 'Nome:') !!}</td>
                    <td>
            {!! $professores->pessoa->nome !!}
        </td></tr>

        <!-- Cpf Field -->
        <tr><td>
            {!! Form::label('cpf', 'CPF:') !!}</td>
                    <td>
            {!! $professores->pessoa->cpf !!}
        </td></tr>

        <!-- Rg Field -->
        <tr><td>
            {!! Form::label('rg', 'RG:') !!}</td>
                    <td>
            {!! $professores->pessoa->rg !!}
        </td></tr>

        <!-- Endereco Field -->
        <tr><td>
            {!! Form::label('endereco', 'Endereco:') !!}</td>
                    <td>
            {!! $professores->pessoa->endereco !!}
        </td></tr>

        <!-- Numero Field -->
        <tr><td>
            {!! Form::label('numero', 'Numero:') !!}</td>
                    <td>
            {!! $professores->pessoa->numero !!}
        </td></tr>

        <!-- Bairro Field -->
        <tr><td>
            {!! Form::label('bairro', 'Bairro:') !!}</td>
                    <td>
            {!! $professores->pessoa->bairro !!}
        </td></tr>

        <!-- Cidade Field -->
        <tr><td>
            {!! Form::label('cidade', 'Cidade:') !!}</td>
                    <td>
            {!! $professores->pessoa->cidade !!}
        </td></tr>
    </table>
</div>

<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">	
            <!-- Estado Field -->
        <tr><td width="30%">
            {!! Form::label('estado', 'Estado:') !!}</td>
                        <td>
            {!! $professores->pessoa->estado !!}
        </td></tr>

        <!-- Cep Field -->
        <tr><td>
            {!! Form::label('cep', 'Cep:') !!}</td>
                        <td>
            {!! $professores->pessoa->cep !!}
        </td></tr>

        <!-- Telefone Field -->
        <tr><td>
            {!! Form::label('telefone', 'Telefone:') !!}</td>
                        <td>
            {!! $professores->pessoa->telefone !!}
        </td></tr>

        <!-- Celular Field -->
        <tr>
                    <td>{!! Form::label('celular', 'Celular:') !!}</td>
                    <td>{!! $professores->pessoa->celular !!}</td>
        </tr>

        <!-- Email Field -->
        <tr><td>
            {!! Form::label('email', 'Email:') !!}</td>
                        <td>
            {!! $professores->pessoa->email !!}
        </td></tr>

        <!-- Dt Nasc Field -->
        <tr><td>
            {!! Form::label('dt_nasc', 'Data de Nascimento:') !!}</td>
                        <td>
            {!! $professores->pessoa->dt_nasc->format('d/m/Y')  !!}
        </td></tr>

        <!-- Salario Field -->
        <tr><td>
            {!! Form::label('salario', 'Salario:') !!}</td>
                        <td>
            {!! $professores->salario !!}
        </td></tr>

        <!-- Created At Field -->
        <tr><td>
            {!! Form::label('created_at', 'Created At:') !!}</td>
                        <td>
            {!! $professores->created_at->format('d/m/Y h:m:s') !!}
        </td></tr>

        <!-- Updated At Field -->
        <tr><td>
            {!! Form::label('updated_at', 'Updated At:') !!}</td>
                        <td>
            {!! $professores->updated_at->format('d/m/Y h:m:s') !!}
        </td></tr>
    </table>
</div>








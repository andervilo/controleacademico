<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">
        <tr ><td width="30%">
            {!! Form::label('id', 'Id:') !!}
                    </td><td>
            {!! $alunos->id !!}
        </td></tr>
        
        <!-- Matricula Field -->
        <tr><td>
            {!! Form::label('matricula', 'Matricula:') !!}
            </td><td>
            {!! $alunos->matricula !!}
        </td></tr>

        <!-- Nome Field -->
        <tr><td>
            {!! Form::label('nome', 'Nome:') !!}</td>
                    <td>
            {!! $alunos->pessoa->nome !!}
        </td></tr>

        <!-- Cpf Field -->
        <tr><td>
            {!! Form::label('cpf', 'CPF:') !!}</td>
                    <td>
            {!! $alunos->pessoa->cpf !!}
        </td></tr>

        <!-- Rg Field -->
        <tr><td>
            {!! Form::label('rg', 'RG:') !!}</td>
                    <td>
            {!! $alunos->pessoa->rg !!}
        </td></tr>

        <!-- Endereco Field -->
        <tr><td>
            {!! Form::label('endereco', 'Endereco:') !!}</td>
                    <td>
            {!! $alunos->pessoa->endereco !!}
        </td></tr>

        <!-- Numero Field -->
        <tr><td>
            {!! Form::label('numero', 'Numero:') !!}</td>
                    <td>
            {!! $alunos->pessoa->numero !!}
        </td></tr>

        <!-- Bairro Field -->
        <tr><td>
            {!! Form::label('bairro', 'Bairro:') !!}</td>
                    <td>
            {!! $alunos->pessoa->bairro !!}
        </td></tr>

        <!-- Cidade Field -->
        <tr><td>
            {!! Form::label('cidade', 'Cidade:') !!}</td>
                    <td>
            {!! $alunos->pessoa->cidade !!}
        </td></tr>
    </table>
</div>

<div class="col-md-6">
    <table class="table table-condensed table-striped table-hover">	
            <!-- Estado Field -->
        <tr><td width="30%">
            {!! Form::label('estado', 'Estado:') !!}</td>
                        <td>
            {!! $alunos->pessoa->estado !!}
        </td></tr>

        <!-- Cep Field -->
        <tr><td>
            {!! Form::label('cep', 'Cep:') !!}</td>
                        <td>
            {!! $alunos->pessoa->cep !!}
        </td></tr>

        <!-- Telefone Field -->
        <tr><td>
            {!! Form::label('telefone', 'Telefone:') !!}</td>
                        <td>
            {!! $alunos->pessoa->telefone !!}
        </td></tr>

        <!-- Celular Field -->
        <tr>
                    <td>{!! Form::label('celular', 'Celular:') !!}</td>
                    <td>{!! $alunos->pessoa->celular !!}</td>
        </tr>

        <!-- Email Field -->
        <tr><td>
            {!! Form::label('email', 'Email:') !!}</td>
                        <td>
            {!! $alunos->pessoa->email !!}
        </td></tr>

        <!-- Dt Nasc Field -->
        <tr><td>
            {!! Form::label('dt_nasc', 'Data de Nascimento:') !!}</td>
                        <td>
            {!! $alunos->pessoa->dt_nasc->format('d/m/Y')  !!}
        </td></tr>


        <!-- Created At Field -->
        <tr><td>
            {!! Form::label('created_at', 'Created At:') !!}</td>
                        <td>
            {!! $alunos->created_at->format('d/m/Y h:m:s') !!}
        </td></tr>

        <!-- Updated At Field -->
        <tr><td>
            {!! Form::label('updated_at', 'Updated At:') !!}</td>
                        <td>
            {!! $alunos->updated_at->format('d/m/Y h:m:s') !!}
        </td></tr>
    </table>
</div>























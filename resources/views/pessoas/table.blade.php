<table class="table table-responsive" id="pessoas-table">
    <thead>
        <tr>
            <th>Nome</th>
        <th>Cpf</th>
        <th>Rg</th>
        <th>Endereco</th>
        <th>Numero</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Cep</th>
        <th>Telefone</th>
        <th>Celular</th>
        <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($pessoas as $pessoas)
        <tr>
            <td>{!! $pessoas->nome !!}</td>
            <td>{!! $pessoas->cpf !!}</td>
            <td>{!! $pessoas->rg !!}</td>
            <td>{!! $pessoas->endereco !!}</td>
            <td>{!! $pessoas->numero !!}</td>
            <td>{!! $pessoas->bairro !!}</td>
            <td>{!! $pessoas->cidade !!}</td>
            <td>{!! $pessoas->estado !!}</td>
            <td>{!! $pessoas->cep !!}</td>
            <td>{!! $pessoas->telefone !!}</td>
            <td>{!! $pessoas->celular !!}</td>
            <td>{!! $pessoas->email !!}</td>
            <td>
                {!! Form::open(['route' => ['pessoas.destroy', $pessoas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('pessoas.show', [$pessoas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('pessoas.edit', [$pessoas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
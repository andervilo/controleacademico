<table class="table table-responsive" id="escolas-table">
    <thead>
        <tr>
            <th>ID[Tenant]</th>
            <th>Nome</th>
        <th>Endereco</th>
        <th>Numero</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th>Estado</th>
        <th>Cep</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($escolas as $escolas)
        <tr>
            <td>{!! $escolas->id !!}</td>
            <td>{!! $escolas->nome !!}</td>
            <td>{!! $escolas->endereco !!}</td>
            <td>{!! $escolas->numero !!}</td>
            <td>{!! $escolas->bairro !!}</td>
            <td>{!! $escolas->cidade !!}</td>
            <td>{!! $escolas->estado !!}</td>
            <td>{!! $escolas->cep !!}</td>
            <td>
                {!! Form::open(['route' => ['escolas.destroy', $escolas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('escolas.show', [$escolas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('escolas.edit', [$escolas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
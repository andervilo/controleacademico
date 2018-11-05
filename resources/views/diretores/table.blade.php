<table class="table table-responsive" id="diretores-table">
    <thead>
        <tr>
            <th>Id Funcional</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($diretores as $diretores)
        <tr>
            <td>{!! $diretores->id_funcional !!}</td>
            <td>{!! $diretores->pessoa->nome !!}</td>            
            <td>{!! $diretores->pessoa->telefone !!}</td>
            <td>{!! $diretores->pessoa->celular !!}</td>
            <td>{!! $diretores->pessoa->email !!}</td>
            <td>
                {!! Form::open(['route' => ['diretores.destroy', $diretores->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('diretores.show', [$diretores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('diretores.edit', [$diretores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
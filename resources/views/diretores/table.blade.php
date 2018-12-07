<div class="table table-responsive">
<table class="table table-striped table-condensed" id="diretores-table">
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
    @foreach($diretores as $diretor)
        <tr>
            <td>{!! $diretor->id_funcional !!}</td>
            <td>{!! $diretor->pessoa->nome !!}</td>
            <td>{!! $diretor->pessoa->telefone !!}</td>
            <td>{!! $diretor->pessoa->celular !!}</td>
            <td>{!! $diretor->pessoa->email !!}</td>
            <td>
                {!! Form::open(['route' => ['diretores.destroy', $diretor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('diretores.show', [$diretor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('diretores.edit', [$diretor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-center">
    {!! $diretores->appends(['q'=>$q])->links() !!}
</div>
</div>

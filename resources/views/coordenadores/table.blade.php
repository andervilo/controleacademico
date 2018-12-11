<div class="table table-responsive">
    <table  id="coordenadores-table" class="table table-striped table-condensed">
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
        @foreach($coordenadores as $coordenador)
            <tr>
                <td>{!! $coordenador->id_funcional !!}</td>
                <td>{!! $coordenador->pessoa->nome !!}</td>
                <td>{!! $coordenador->pessoa->telefone !!}</td>
                <td>{!! $coordenador->pessoa->celular !!}</td>
                <td>{!! $coordenador->pessoa->email !!}</td>
                <td>
                    {!! Form::open(['route' => ['coordenadores.destroy', $coordenador->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('coordenadores.show', [$coordenador->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('coordenadores.edit', [$coordenador->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="text-center">
        {!! $coordenadores->appends(['q'=>$q])->links() !!}
    </div>
</div>

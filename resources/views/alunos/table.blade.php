<table class="table table-responsive" id="alunos-table">
    <thead>
        <tr>
            <th>Matrícula</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($alunos as $alunos)
        <tr>
            <td>{!! $alunos->matricula !!}</td>
            <td>{!! $alunos->pessoa->nome !!}</td>            
            <td>{!! $alunos->pessoa->telefone !!}</td>
            <td>{!! $alunos->pessoa->celular !!}</td>
            <td>{!! $alunos->pessoa->email !!}</td>
            <td>
                {!! Form::open(['route' => ['alunos.destroy', $alunos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alunos.show', [$alunos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alunos.edit', [$alunos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
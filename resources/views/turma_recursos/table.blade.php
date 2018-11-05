<table class="table table-responsive" id="turmaRecursos-table">
    <thead>
        <tr>
            <th>Recurso</th>
        <th>Turma</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($turmaRecursos as $turmaRecurso)
        <tr>
            <td>{!! $turmaRecurso->recurso->descricao !!}</td>
            <td>{!! $turmaRecurso->turma->identificador !!}</td>
            <td>
                {!! Form::open(['route' => ['turmaRecursos.destroy', $turmaRecurso->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('turmaRecursos.edit', [$turmaRecurso->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
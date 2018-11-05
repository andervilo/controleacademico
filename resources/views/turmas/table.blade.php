<table class="table table-responsive" id="turmas-table">
    <thead>
        <tr>
            <th>Curso</th>
        <th>Professor</th>
        <th>
            <div>Código Turma</div>
            <div>Número Sala</div>
        </th>
        <th>
            <div>Alunos</div>
            <div>Recursos</div>
        </th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($turmas as $turmas)
        <tr>
            <td>{!! $turmas->curso->nome !!}</td>
            <td>{!! $turmas->professor->pessoa->nome !!}</td>
            <td>
                <div>{!! $turmas->identificador !!}</div>
                <div>{!! $turmas->sala_numero !!}</div>
            </td>
            <td>
                <div>
                <a href="{!! url('notaFrequencias/turma', [$turmas->id]) !!}" class='btn btn-success btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i> Alunos
                </a>
                </div>
                <div>
                <a href="{!! url('turmaRecursos/turma', [$turmas->id]) !!}" class='btn btn-warning btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i> Recursos
                </a>
                </div>
            </td>
            <td>
                {!! Form::open(['route' => ['turmas.destroy', $turmas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    
                    <a href="{!! route('turmas.edit', [$turmas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
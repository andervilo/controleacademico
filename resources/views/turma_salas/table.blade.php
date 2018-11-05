<table class="table table-responsive" id="turmaSalas-table">
    <thead>
        <tr>
            <th>Turma Id</th>
        <th>Sala Id</th>
        <th>Dia Semana</th>
        <th>Hora Inicio</th>
        <th>Hora Fim</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($turmaSalas as $turmaSala)
        <tr>
            <td>{!! $turmaSala->turma_id !!}</td>
            <td>{!! $turmaSala->sala_id !!}</td>
            <td>{!! $turmaSala->dia_semana !!}</td>
            <td>{!! $turmaSala->hora_inicio !!}</td>
            <td>{!! $turmaSala->hora_fim !!}</td>
            <td>
                {!! Form::open(['route' => ['turmaSalas.destroy', $turmaSala->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('turmaSalas.show', [$turmaSala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('turmaSalas.edit', [$turmaSala->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
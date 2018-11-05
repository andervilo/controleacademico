<table class="table table-responsive" id="salas-table">
    <thead>
        <tr>
            <th>Numero</th>
        <th>Capacidade</th>
        <th>Setor</th>
        <th>Andar</th>
        <th>Corredor</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($salas as $salas)
        <tr>
            <td>{!! $salas->numero !!}</td>
            <td>{!! $salas->capacidade !!}</td>
            <td>{!! $salas->setor !!}</td>
            <td>{!! $salas->andar !!}</td>
            <td>{!! $salas->corredor !!}</td>
            <td>
                {!! Form::open(['route' => ['salas.destroy', $salas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('salas.edit', [$salas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
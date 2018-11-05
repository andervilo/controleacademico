<table class="table table-responsive" id="testes-table">
    <thead>
        <tr>
            <th>Teste1</th>
        <th>Teste2</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($testes as $teste)
        <tr>
            <td>{!! $teste->teste1 !!}</td>
            <td>{!! $teste->teste2 !!}</td>
            <td>
                {!! Form::open(['route' => ['testes.destroy', $teste->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('testes.show', [$teste->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('testes.edit', [$teste->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
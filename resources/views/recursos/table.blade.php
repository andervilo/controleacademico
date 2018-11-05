<table class="table table-responsive" id="recursos-table">
    <thead>
        <tr>
            <th>Descricao</th>
        <th>Id Patrimonial</th>
        <th>Data Aquisicao</th>
        <th>Valor Aquisicao</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($recursos as $recursos)
        <tr>
            <td>{!! $recursos->descricao !!}</td>
            <td>{!! $recursos->id_patrimonial !!}</td>
            <td>{!! $recursos->data_aquisicao !!}</td>
            <td>{!! $recursos->valor_aquisicao !!}</td>
            <td>
                {!! Form::open(['route' => ['recursos.destroy', $recursos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('recursos.edit', [$recursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<table class="table table-responsive" id="rotas-table">
    <thead>
        <tr>
            <th>Uri</th>
        <th>Method</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($rotas as $rotas)
        <tr>
            <td>{!! $rotas->uri !!}</td>
            <td>{!! $rotas->method !!}</td>
            <td>
                {!! Form::open(['route' => ['rotas.destroy', $rotas->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('rotas.show', [$rotas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('rotas.edit', [$rotas->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

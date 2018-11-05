<div class="table-responsive">
<table class="table table-responsive" id="periodos-table">
    <thead>
        <tr>
            <th>Escola Id</th>
        <th>Ano</th>
        <th style="text-align: center;">Anual</th>
        <th style="text-align: center;">Semestre1</th>
        <th style="text-align: center;">Semestre2</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($periodos as $periodos)
        <tr>
            <td>{!! $periodos->escola->nome !!}</td>
            <td>{!! $periodos->ano !!}</td>
            <td style="text-align: center;">{!! $periodos->anual ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!} </i></td>
            <td style="text-align: center;">{!! $periodos->semestre1 ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!}</td>
            <td style="text-align: center;">{!! $periodos->semestre2 ? '<i class="text-center text-success fa fa-check"></i>' : '<i class="text-center text-danger fa fa-close"></i>'!!}</td>
            <td>
                {!! Form::open(['route' => ['periodos.destroy', $periodos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('periodos.show', [$periodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('periodos.edit', [$periodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
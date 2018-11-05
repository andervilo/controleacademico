<table class="table table-responsive" id="notaFrequencias-table">
    <thead>
        <tr>
            <th>Turma</th>
            <th>Aluno</th>
            <th>Frequência</th>
            <th>Nota</th>
            <th>Situacao</th>        
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($notaFrequencias as $notaFrequencia)
        <tr>
            <td>{!! $notaFrequencia->turma->identificador !!}</td>
            <td>{!! $notaFrequencia->aluno->pessoa->nome !!}</td>
            <td>{!! $notaFrequencia->frequencia !!}</td>
            <td>{!! $notaFrequencia->nota !!}</td>
            <td>{!! $notaFrequencia->situacao !!}</td>
            
            <td>
                {!! Form::open(['route' => ['notaFrequencias.destroy', $notaFrequencia->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('notaFrequencias.edit', [$notaFrequencia->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
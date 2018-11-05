<table class="table table-responsive" id="cursoProfessors-table">
    <thead>
        <tr>
            <th>Curso Id</th>
        <th>Professor Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cursoProfessors as $cursoProfessor)
        <tr>
            <td>{!! $cursoProfessor->cursos->nome !!}</td>
            <td>{!! $cursoProfessor->professores->nome !!}</td>
            <td>
                {!! Form::open(['route' => ['cursoProfessors.destroy', $cursoProfessor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cursoProfessors.show', [$cursoProfessor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cursoProfessors.edit', [$cursoProfessor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('cursoProfessors.create', [$cursoProfessor->curso_id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
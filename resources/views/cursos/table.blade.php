<div class="table-responsive col-md-12">
<table class="table table-condensed table-striped" id="cursos-table">
    <thead>
        <tr>
            <th>
                <div>Nome Curso</div>
                <div>Coordenador</div>
            </th>
        <th>Escola/Período</th>
        <th>Carga Horária</th>
        <th>
            <div>Professores</div>
            <div>Turmas</div>
        </th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($cursos as $cursos)
        <tr>
            <td>
                <div>{!! $cursos->nome !!}<div>
                <div>{!! $cursos->coordenador->pessoa->nome !!}</div>
            </td>
            <td>{!! $cursos->label_periodo !!}</td>
            <td>{!! $cursos->cargahoraria !!} hora(s)</td>
            <td>
                <div><a title="Adicionar Professor" href="{!! url('cursoProfessors/create',[$cursos->id]) !!}" class='btn btn-success btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i> Professores
                    </a>
                </div>
                <div><a title="Adicionar Professor" href="{!! url('turmas/curso',[$cursos->id]) !!}" class='btn btn-danger btn-xs'>
                    <i class="glyphicon glyphicon-eye-open"></i> Turmas
                    </a>
                </div>
            </td>
            <td>
                {!! Form::open(['route' => ['cursos.destroy', $cursos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('cursos.show', [$cursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('cursos.edit', [$cursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <!--<a title="Adicionar Professor" href="{!! url('cursoProfessors/create',[$cursos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-plus"></i></a>-->
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>
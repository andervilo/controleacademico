<div class="table table-responsive">
<table class="table table-striped table-condensed" id="professores-table">
    <thead>
        <tr>
            <th>Id Funcional</th>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($professores as $professor)
        <tr>
            <td>{!! $professor->id_funcional !!}</td>
            <td>{!! $professor->pessoa->nome !!}</td>
            <td>{!! $professor->pessoa->telefone !!}</td>
            <td>{!! $professor->pessoa->celular !!}</td>
            <td>{!! $professor->pessoa->email !!}</td>
            <td>
                {!! Form::open(['route' => ['professores.destroy', $professor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('professores.show', [$professor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('professores.edit', [$professor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<div class="text-center">
    {!! $professores->appends(['q'=>$q])->links() !!}
</div>
</div>

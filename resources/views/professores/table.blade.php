<table class="table table-responsive" id="professores-table">
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
    @foreach($professores as $professores)
        <tr>
            <td>{!! $professores->id_funcional !!}</td>
            <td>{!! $professores->pessoa->nome !!}</td>            
            <td>{!! $professores->pessoa->telefone !!}</td>
            <td>{!! $professores->pessoa->celular !!}</td>
            <td>{!! $professores->pessoa->email !!}</td>
            <td>
                {!! Form::open(['route' => ['professores.destroy', $professores->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('professores.show', [$professores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('professores.edit', [$professores->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
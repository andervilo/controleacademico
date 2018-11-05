

<li class="{{ Request::is('escolas*') ? 'active' : '' }} dropdown user user-menu">
    <a href="{!! route('escolas.index') !!}">
        <img class="img-rounded" width="40" src="{{asset('images/icons/escola.jpg')}}">
        <span>Escolas</span></a>
</li>

<li class="{{ Request::is('diretores*') ? 'active' : '' }}">
    <a href="{!! route('diretores.index') !!}">
        <img class="img-rounded" width="40" src="{{asset('images/icons/diretor_1.jpg')}}">
    <span>Diretores</span></a>
</li>

<li class="{{ Request::is('coordenadores*') ? 'active' : '' }}">
    <a href="{!! route('coordenadores.index') !!}">
        <img  class="img-rounded" width="40" src="{{asset('images/icons/coordenador1.png')}}">
        <span>Coordenadores</span></a>
</li>

<li class="{{ Request::is('professores*') ? 'active' : '' }}">
    <a href="{!! route('professores.index') !!}">
        <img  class="img-rounded" width="40" src="{{asset('images/icons/professor3.png')}}">
        <span>Professores</span></a>
</li>

<li class="{{ Request::is('alunos*') ? 'active' : '' }}">
    <a href="{!! route('alunos.index') !!}">
        <img  class="img-rounded" width="40" src="{{asset('images/icons/alunos1.png')}}">
        <span> Alunos</span></a>
</li>

<li class="{{ Request::is('periodos*') ? 'active' : '' }}">
    <a href="{!! route('periodos.index') !!}">
        <img  class="img-rounded" width="40" src="{{asset('images/icons/periodo.png')}}">
        <span>Periodos</span></a>
</li>



<li class="{{ Request::is('cursos*') ? 'active' : '' }}">
    <a href="{!! route('cursos.index') !!}">
        <img class="img-rounded" width="40" src="{{asset('images/icons/curso1.png')}}">
        <span>Cursos</span></a>
</li>


<!--<li class="{{ Request::is('turmas*') ? 'active' : '' }}">
    <a href="{!! route('turmas.index') !!}"><i class="fa fa-edit"></i><span>Turmas</span></a>
</li>-->

<li class="{{ Request::is('salas*') ? 'active' : '' }}">
    <a href="{!! route('salas.index') !!}">
        <img class="img-rounded" width="40" src="{{asset('images/icons/sala1.png')}}">
        <span>Salas</span>
    </a>
</li>

<li class="{{ Request::is('recursos*') ? 'active' : '' }}">
    <a href="{!! route('recursos.index') !!}">
        <img class="img-rounded" width="40" src="{{asset('images/icons/recursos1.png')}}">
        <span>Recursos</span></a>
</li>

<!--<li class="{{ Request::is('notaFrequencias*') ? 'active' : '' }}">
    <a href="{!! route('notaFrequencias.index') !!}"><i class="fa fa-edit"></i><span>Nota Frequencias</span></a>
</li>-->

<!--<li class="{{ Request::is('turmaRecursos*') ? 'active' : '' }}">
    <a href="{!! route('turmaRecursos.index') !!}"><i class="fa fa-edit"></i><span>Turma Recursos</span></a>
</li>-->

<!--<li class="{{ Request::is('turmaSalas*') ? 'active' : '' }}">
    <a href="{!! route('turmaSalas.index') !!}"><i class="fa fa-edit"></i><span>Turma Salas</span></a>
</li>-->


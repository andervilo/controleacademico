<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => ['web','auth']], function () {

    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

    Route::resource('escolas', 'EscolasController');

    Route::resource('pessoas', 'PessoasController');

    Route::resource('diretores', 'DiretoresController');

    Route::resource('coordenadores', 'CoordenadoresController');

    Route::resource('professores', 'ProfessoresController');

    Route::resource('alunos', 'AlunosController');

    Route::resource('periodos', 'PeriodosController');

    Route::resource('cursos', 'CursosController');

    Route::resource('cursoProfessors', 'CursoProfessorController');
    Route::get('cursoProfessors/create/{id}', 'CursoProfessorController@create');
    Route::get('turmas/create/{id}', 'TurmasController@create');
    Route::get('turmas/curso/{id}', 'TurmasController@index');




    Route::resource('turmas', 'TurmasController');

    Route::resource('salas', 'SalasController');

    Route::resource('recursos', 'RecursosController');

    Route::resource('notaFrequencias', 'NotaFrequenciaController');
    Route::get('notaFrequencias/turma/{id}', 'NotaFrequenciaController@index');
    Route::get('notaFrequencias/create/turma/{id}', 'NotaFrequenciaController@create');

    Route::resource('turmaRecursos', 'TurmaRecursoController');
    Route::get('turmaRecursos/turma/{id}', 'TurmaRecursoController@index');
    Route::get('turmaRecursos/create/turma/{id}', 'TurmaRecursoController@create');

    Route::resource('turmaSalas', 'TurmaSalaController');
    Route::resource('users', 'UsersController');
    Route::resource('roles', 'RolesController');
    Route::resource('permissions', 'PermissionsController');


});



Route::resource('rotas', 'RotasController');
<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('escolas', 'EscolasAPIController');

Route::resource('pessoas', 'PessoasAPIController');

Route::resource('diretores', 'DiretoresAPIController');

Route::resource('coordenadores', 'CoordenadoresAPIController');

Route::resource('professores', 'ProfessoresAPIController');

Route::resource('alunos', 'AlunosAPIController');

Route::resource('periodos', 'PeriodosAPIController');

Route::resource('testes', 'TesteAPIController');

Route::resource('cursos', 'CursosAPIController');

Route::resource('curso_professors', 'CursoProfessorAPIController');

Route::resource('turmas', 'TurmasAPIController');

Route::resource('salas', 'SalasAPIController');

Route::resource('recursos', 'RecursosAPIController');

Route::resource('nota_frequencias', 'NotaFrequenciaAPIController');

Route::resource('turma_recursos', 'TurmaRecursoAPIController');

Route::resource('turma_salas', 'TurmaSalaAPIController');

Route::resource('rotas', 'RotasAPIController');
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaRecursoRequest;
use App\Http\Requests\UpdateTurmaRecursoRequest;
use App\Repositories\TurmaRecursoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TurmaRecursoController extends AppBaseController
{
    /** @var  TurmaRecursoRepository */
    private $turmaRecursoRepository;

    public function __construct(TurmaRecursoRepository $turmaRecursoRepo)
    {
        $this->turmaRecursoRepository = $turmaRecursoRepo;
    }

    /**
     * Display a listing of the TurmaRecurso.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$id=null)
    {
        $this->turmaRecursoRepository->pushCriteria(new RequestCriteria($request));
        $turmaRecursos = $this->turmaRecursoRepository->findByField(['turma_id'=>$id])->all();

        return view('turma_recursos.index',
                [
                    'turmaRecursos'=> $turmaRecursos,
                    'turma_id'=>$id
                ]
            );
    }

    /**
     * Show the form for creating a new TurmaRecurso.
     *
     * @return Response
     */
    public function create(
                $id=null,
                \App\Repositories\TurmasRepository $TurmasRepository,
                \App\Repositories\RecursosRepository $RecursosRepository
            )
    {
        $turma = $TurmasRepository->findWhere(['id'=>$id])->pluck('identificador','id');
        $recursos = $RecursosRepository->all()->pluck('descricao','id')->toArray();
        array_unshift($recursos, 'Selecione um Recurso...');
        return view('turma_recursos.create',['turma_id'=>$id,'recursos'=>$recursos,'turma'=>$turma]);
    }

    /**
     * Store a newly created TurmaRecurso in storage.
     *
     * @param CreateTurmaRecursoRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmaRecursoRequest $request)
    {
        $input = $request->all();

        $turmaRecurso = $this->turmaRecursoRepository->create($input);

        Flash::success('Turma Recurso saved successfully.');

        return redirect(url('turmaRecursos/turma',[$turmaRecurso['turma_id']]));
    }

    /**
     * Display the specified TurmaRecurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            Flash::error('Turma Recurso not found');

            return redirect(route('turmaRecursos.index'));
        }

        return view('turma_recursos.show')->with('turmaRecurso', $turmaRecurso);
    }

    /**
     * Show the form for editing the specified TurmaRecurso.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(
                $id,
                \App\Repositories\TurmasRepository $TurmasRepository,
                \App\Repositories\RecursosRepository $RecursosRepository
            )
    {
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            Flash::error('Turma Recurso not found');

            return redirect(route('turmaRecursos.index'));
        }
        $turma = $TurmasRepository->findWhere(['id'=>$turmaRecurso['turma_id']])->pluck('identificador','id');
        $recursos = $RecursosRepository->all()->pluck('descricao','id')->toArray();
        

        //return view('turma_recursos.edit')->with('turmaRecurso', $turmaRecurso);
        return view('turma_recursos.edit',['turmaRecurso'=> $turmaRecurso,'turma_id'=>$id,'recursos'=>$recursos,'turma'=>$turma]);
    }

    /**
     * Update the specified TurmaRecurso in storage.
     *
     * @param  int              $id
     * @param UpdateTurmaRecursoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmaRecursoRequest $request)
    {
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            Flash::error('Turma Recurso not found');

            return redirect(route('turmaRecursos.index'));
        }

        $turmaRecurso = $this->turmaRecursoRepository->update($request->all(), $id);

        Flash::success('Turma Recurso updated successfully.');

        return redirect(url('turmaRecursos/turma',$turmaRecurso['turma_id']));
    }

    /**
     * Remove the specified TurmaRecurso from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            Flash::error('Turma Recurso not found');

            return redirect(route('turmaRecursos.index'));
        }

        $this->turmaRecursoRepository->delete($id);

        Flash::success('Turma Recurso deleted successfully.');

        return redirect(url('turmaRecursos/turma',[$turmaRecurso['turma_id']]));
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTurmaRecursoAPIRequest;
use App\Http\Requests\API\UpdateTurmaRecursoAPIRequest;
use App\Models\TurmaRecurso;
use App\Repositories\TurmaRecursoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TurmaRecursoController
 * @package App\Http\Controllers\API
 */

class TurmaRecursoAPIController extends AppBaseController
{
    /** @var  TurmaRecursoRepository */
    private $turmaRecursoRepository;

    public function __construct(TurmaRecursoRepository $turmaRecursoRepo)
    {
        $this->turmaRecursoRepository = $turmaRecursoRepo;
    }

    /**
     * Display a listing of the TurmaRecurso.
     * GET|HEAD /turmaRecursos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->turmaRecursoRepository->pushCriteria(new RequestCriteria($request));
        $this->turmaRecursoRepository->pushCriteria(new LimitOffsetCriteria($request));
        $turmaRecursos = $this->turmaRecursoRepository->all();

        return $this->sendResponse($turmaRecursos->toArray(), 'Turma Recursos retrieved successfully');
    }

    /**
     * Store a newly created TurmaRecurso in storage.
     * POST /turmaRecursos
     *
     * @param CreateTurmaRecursoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmaRecursoAPIRequest $request)
    {
        $input = $request->all();

        $turmaRecursos = $this->turmaRecursoRepository->create($input);

        return $this->sendResponse($turmaRecursos->toArray(), 'Turma Recurso saved successfully');
    }

    /**
     * Display the specified TurmaRecurso.
     * GET|HEAD /turmaRecursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TurmaRecurso $turmaRecurso */
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            return $this->sendError('Turma Recurso not found');
        }

        return $this->sendResponse($turmaRecurso->toArray(), 'Turma Recurso retrieved successfully');
    }

    /**
     * Update the specified TurmaRecurso in storage.
     * PUT/PATCH /turmaRecursos/{id}
     *
     * @param  int $id
     * @param UpdateTurmaRecursoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmaRecursoAPIRequest $request)
    {
        $input = $request->all();

        /** @var TurmaRecurso $turmaRecurso */
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            return $this->sendError('Turma Recurso not found');
        }

        $turmaRecurso = $this->turmaRecursoRepository->update($input, $id);

        return $this->sendResponse($turmaRecurso->toArray(), 'TurmaRecurso updated successfully');
    }

    /**
     * Remove the specified TurmaRecurso from storage.
     * DELETE /turmaRecursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TurmaRecurso $turmaRecurso */
        $turmaRecurso = $this->turmaRecursoRepository->findWithoutFail($id);

        if (empty($turmaRecurso)) {
            return $this->sendError('Turma Recurso not found');
        }

        $turmaRecurso->delete();

        return $this->sendResponse($id, 'Turma Recurso deleted successfully');
    }
}

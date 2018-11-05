<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCursoProfessorAPIRequest;
use App\Http\Requests\API\UpdateCursoProfessorAPIRequest;
use App\Models\CursoProfessor;
use App\Repositories\CursoProfessorRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CursoProfessorController
 * @package App\Http\Controllers\API
 */

class CursoProfessorAPIController extends AppBaseController
{
    /** @var  CursoProfessorRepository */
    private $cursoProfessorRepository;

    public function __construct(CursoProfessorRepository $cursoProfessorRepo)
    {
        $this->cursoProfessorRepository = $cursoProfessorRepo;
    }

    /**
     * Display a listing of the CursoProfessor.
     * GET|HEAD /cursoProfessors
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cursoProfessorRepository->pushCriteria(new RequestCriteria($request));
        $this->cursoProfessorRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cursoProfessors = $this->cursoProfessorRepository->all();

        return $this->sendResponse($cursoProfessors->toArray(), 'Curso Professors retrieved successfully');
    }

    /**
     * Store a newly created CursoProfessor in storage.
     * POST /cursoProfessors
     *
     * @param CreateCursoProfessorAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCursoProfessorAPIRequest $request)
    {
        $input = $request->all();

        $cursoProfessors = $this->cursoProfessorRepository->create($input);

        return $this->sendResponse($cursoProfessors->toArray(), 'Curso Professor saved successfully');
    }

    /**
     * Display the specified CursoProfessor.
     * GET|HEAD /cursoProfessors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CursoProfessor $cursoProfessor */
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            return $this->sendError('Curso Professor not found');
        }

        return $this->sendResponse($cursoProfessor->toArray(), 'Curso Professor retrieved successfully');
    }

    /**
     * Update the specified CursoProfessor in storage.
     * PUT/PATCH /cursoProfessors/{id}
     *
     * @param  int $id
     * @param UpdateCursoProfessorAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursoProfessorAPIRequest $request)
    {
        $input = $request->all();

        /** @var CursoProfessor $cursoProfessor */
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            return $this->sendError('Curso Professor not found');
        }

        $cursoProfessor = $this->cursoProfessorRepository->update($input, $id);

        return $this->sendResponse($cursoProfessor->toArray(), 'CursoProfessor updated successfully');
    }

    /**
     * Remove the specified CursoProfessor from storage.
     * DELETE /cursoProfessors/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CursoProfessor $cursoProfessor */
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            return $this->sendError('Curso Professor not found');
        }

        $cursoProfessor->delete();

        return $this->sendResponse($id, 'Curso Professor deleted successfully');
    }
}

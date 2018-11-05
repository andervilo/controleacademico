<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAlunosAPIRequest;
use App\Http\Requests\API\UpdateAlunosAPIRequest;
use App\Models\Alunos;
use App\Repositories\AlunosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class AlunosController
 * @package App\Http\Controllers\API
 */

class AlunosAPIController extends AppBaseController
{
    /** @var  AlunosRepository */
    private $alunosRepository;

    public function __construct(AlunosRepository $alunosRepo)
    {
        $this->alunosRepository = $alunosRepo;
    }

    /**
     * Display a listing of the Alunos.
     * GET|HEAD /alunos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->alunosRepository->pushCriteria(new RequestCriteria($request));
        $this->alunosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $alunos = $this->alunosRepository->all();

        return $this->sendResponse($alunos->toArray(), 'Alunos retrieved successfully');
    }

    /**
     * Store a newly created Alunos in storage.
     * POST /alunos
     *
     * @param CreateAlunosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAlunosAPIRequest $request)
    {
        $input = $request->all();

        $alunos = $this->alunosRepository->create($input);

        return $this->sendResponse($alunos->toArray(), 'Alunos saved successfully');
    }

    /**
     * Display the specified Alunos.
     * GET|HEAD /alunos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Alunos $alunos */
        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            return $this->sendError('Alunos not found');
        }

        return $this->sendResponse($alunos->toArray(), 'Alunos retrieved successfully');
    }

    /**
     * Update the specified Alunos in storage.
     * PUT/PATCH /alunos/{id}
     *
     * @param  int $id
     * @param UpdateAlunosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlunosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Alunos $alunos */
        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            return $this->sendError('Alunos not found');
        }

        $alunos = $this->alunosRepository->update($input, $id);

        return $this->sendResponse($alunos->toArray(), 'Alunos updated successfully');
    }

    /**
     * Remove the specified Alunos from storage.
     * DELETE /alunos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Alunos $alunos */
        $alunos = $this->alunosRepository->findWithoutFail($id);

        if (empty($alunos)) {
            return $this->sendError('Alunos not found');
        }

        $alunos->delete();

        return $this->sendResponse($id, 'Alunos deleted successfully');
    }
}

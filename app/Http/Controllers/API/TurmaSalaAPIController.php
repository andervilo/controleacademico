<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTurmaSalaAPIRequest;
use App\Http\Requests\API\UpdateTurmaSalaAPIRequest;
use App\Models\TurmaSala;
use App\Repositories\TurmaSalaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TurmaSalaController
 * @package App\Http\Controllers\API
 */

class TurmaSalaAPIController extends AppBaseController
{
    /** @var  TurmaSalaRepository */
    private $turmaSalaRepository;

    public function __construct(TurmaSalaRepository $turmaSalaRepo)
    {
        $this->turmaSalaRepository = $turmaSalaRepo;
    }

    /**
     * Display a listing of the TurmaSala.
     * GET|HEAD /turmaSalas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->turmaSalaRepository->pushCriteria(new RequestCriteria($request));
        $this->turmaSalaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $turmaSalas = $this->turmaSalaRepository->all();

        return $this->sendResponse($turmaSalas->toArray(), 'Turma Salas retrieved successfully');
    }

    /**
     * Store a newly created TurmaSala in storage.
     * POST /turmaSalas
     *
     * @param CreateTurmaSalaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmaSalaAPIRequest $request)
    {
        $input = $request->all();

        $turmaSalas = $this->turmaSalaRepository->create($input);

        return $this->sendResponse($turmaSalas->toArray(), 'Turma Sala saved successfully');
    }

    /**
     * Display the specified TurmaSala.
     * GET|HEAD /turmaSalas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TurmaSala $turmaSala */
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            return $this->sendError('Turma Sala not found');
        }

        return $this->sendResponse($turmaSala->toArray(), 'Turma Sala retrieved successfully');
    }

    /**
     * Update the specified TurmaSala in storage.
     * PUT/PATCH /turmaSalas/{id}
     *
     * @param  int $id
     * @param UpdateTurmaSalaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmaSalaAPIRequest $request)
    {
        $input = $request->all();

        /** @var TurmaSala $turmaSala */
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            return $this->sendError('Turma Sala not found');
        }

        $turmaSala = $this->turmaSalaRepository->update($input, $id);

        return $this->sendResponse($turmaSala->toArray(), 'TurmaSala updated successfully');
    }

    /**
     * Remove the specified TurmaSala from storage.
     * DELETE /turmaSalas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TurmaSala $turmaSala */
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            return $this->sendError('Turma Sala not found');
        }

        $turmaSala->delete();

        return $this->sendResponse($id, 'Turma Sala deleted successfully');
    }
}

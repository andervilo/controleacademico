<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTurmasAPIRequest;
use App\Http\Requests\API\UpdateTurmasAPIRequest;
use App\Models\Turmas;
use App\Repositories\TurmasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TurmasController
 * @package App\Http\Controllers\API
 */

class TurmasAPIController extends AppBaseController
{
    /** @var  TurmasRepository */
    private $turmasRepository;

    public function __construct(TurmasRepository $turmasRepo)
    {
        $this->turmasRepository = $turmasRepo;
    }

    /**
     * Display a listing of the Turmas.
     * GET|HEAD /turmas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->turmasRepository->pushCriteria(new RequestCriteria($request));
        $this->turmasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $turmas = $this->turmasRepository->all();

        return $this->sendResponse($turmas->toArray(), 'Turmas retrieved successfully');
    }

    /**
     * Store a newly created Turmas in storage.
     * POST /turmas
     *
     * @param CreateTurmasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmasAPIRequest $request)
    {
        $input = $request->all();

        $turmas = $this->turmasRepository->create($input);

        return $this->sendResponse($turmas->toArray(), 'Turmas saved successfully');
    }

    /**
     * Display the specified Turmas.
     * GET|HEAD /turmas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Turmas $turmas */
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            return $this->sendError('Turmas not found');
        }

        return $this->sendResponse($turmas->toArray(), 'Turmas retrieved successfully');
    }

    /**
     * Update the specified Turmas in storage.
     * PUT/PATCH /turmas/{id}
     *
     * @param  int $id
     * @param UpdateTurmasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Turmas $turmas */
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            return $this->sendError('Turmas not found');
        }

        $turmas = $this->turmasRepository->update($input, $id);

        return $this->sendResponse($turmas->toArray(), 'Turmas updated successfully');
    }

    /**
     * Remove the specified Turmas from storage.
     * DELETE /turmas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Turmas $turmas */
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            return $this->sendError('Turmas not found');
        }

        $turmas->delete();

        return $this->sendResponse($id, 'Turmas deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalasAPIRequest;
use App\Http\Requests\API\UpdateSalasAPIRequest;
use App\Models\Salas;
use App\Repositories\SalasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SalasController
 * @package App\Http\Controllers\API
 */

class SalasAPIController extends AppBaseController
{
    /** @var  SalasRepository */
    private $salasRepository;

    public function __construct(SalasRepository $salasRepo)
    {
        $this->salasRepository = $salasRepo;
    }

    /**
     * Display a listing of the Salas.
     * GET|HEAD /salas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salasRepository->pushCriteria(new RequestCriteria($request));
        $this->salasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salas = $this->salasRepository->all();

        return $this->sendResponse($salas->toArray(), 'Salas retrieved successfully');
    }

    /**
     * Store a newly created Salas in storage.
     * POST /salas
     *
     * @param CreateSalasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSalasAPIRequest $request)
    {
        $input = $request->all();

        $salas = $this->salasRepository->create($input);

        return $this->sendResponse($salas->toArray(), 'Salas saved successfully');
    }

    /**
     * Display the specified Salas.
     * GET|HEAD /salas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Salas $salas */
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            return $this->sendError('Salas not found');
        }

        return $this->sendResponse($salas->toArray(), 'Salas retrieved successfully');
    }

    /**
     * Update the specified Salas in storage.
     * PUT/PATCH /salas/{id}
     *
     * @param  int $id
     * @param UpdateSalasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Salas $salas */
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            return $this->sendError('Salas not found');
        }

        $salas = $this->salasRepository->update($input, $id);

        return $this->sendResponse($salas->toArray(), 'Salas updated successfully');
    }

    /**
     * Remove the specified Salas from storage.
     * DELETE /salas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Salas $salas */
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            return $this->sendError('Salas not found');
        }

        $salas->delete();

        return $this->sendResponse($id, 'Salas deleted successfully');
    }
}

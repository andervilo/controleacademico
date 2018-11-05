<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCoordenadoresAPIRequest;
use App\Http\Requests\API\UpdateCoordenadoresAPIRequest;
use App\Models\Coordenadores;
use App\Repositories\CoordenadoresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CoordenadoresController
 * @package App\Http\Controllers\API
 */

class CoordenadoresAPIController extends AppBaseController
{
    /** @var  CoordenadoresRepository */
    private $coordenadoresRepository;

    public function __construct(CoordenadoresRepository $coordenadoresRepo)
    {
        $this->coordenadoresRepository = $coordenadoresRepo;
    }

    /**
     * Display a listing of the Coordenadores.
     * GET|HEAD /coordenadores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->coordenadoresRepository->pushCriteria(new RequestCriteria($request));
        $this->coordenadoresRepository->pushCriteria(new LimitOffsetCriteria($request));
        $coordenadores = $this->coordenadoresRepository->all();

        return $this->sendResponse($coordenadores->toArray(), 'Coordenadores retrieved successfully');
    }

    /**
     * Store a newly created Coordenadores in storage.
     * POST /coordenadores
     *
     * @param CreateCoordenadoresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCoordenadoresAPIRequest $request)
    {
        $input = $request->all();

        $coordenadores = $this->coordenadoresRepository->create($input);

        return $this->sendResponse($coordenadores->toArray(), 'Coordenadores saved successfully');
    }

    /**
     * Display the specified Coordenadores.
     * GET|HEAD /coordenadores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Coordenadores $coordenadores */
        $coordenadores = $this->coordenadoresRepository->findWithoutFail($id);

        if (empty($coordenadores)) {
            return $this->sendError('Coordenadores not found');
        }

        return $this->sendResponse($coordenadores->toArray(), 'Coordenadores retrieved successfully');
    }

    /**
     * Update the specified Coordenadores in storage.
     * PUT/PATCH /coordenadores/{id}
     *
     * @param  int $id
     * @param UpdateCoordenadoresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoordenadoresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Coordenadores $coordenadores */
        $coordenadores = $this->coordenadoresRepository->findWithoutFail($id);

        if (empty($coordenadores)) {
            return $this->sendError('Coordenadores not found');
        }

        $coordenadores = $this->coordenadoresRepository->update($input, $id);

        return $this->sendResponse($coordenadores->toArray(), 'Coordenadores updated successfully');
    }

    /**
     * Remove the specified Coordenadores from storage.
     * DELETE /coordenadores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Coordenadores $coordenadores */
        $coordenadores = $this->coordenadoresRepository->findWithoutFail($id);

        if (empty($coordenadores)) {
            return $this->sendError('Coordenadores not found');
        }

        $coordenadores->delete();

        return $this->sendResponse($id, 'Coordenadores deleted successfully');
    }
}

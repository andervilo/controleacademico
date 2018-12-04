<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRotasAPIRequest;
use App\Http\Requests\API\UpdateRotasAPIRequest;
use App\Models\Rotas;
use App\Repositories\RotasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RotasController
 * @package App\Http\Controllers\API
 */

class RotasAPIController extends AppBaseController
{
    /** @var  RotasRepository */
    private $rotasRepository;

    public function __construct(RotasRepository $rotasRepo)
    {
        $this->rotasRepository = $rotasRepo;
    }

    /**
     * Display a listing of the Rotas.
     * GET|HEAD /rotas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rotasRepository->pushCriteria(new RequestCriteria($request));
        $this->rotasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $rotas = $this->rotasRepository->all();

        return $this->sendResponse($rotas->toArray(), 'Rotas retrieved successfully');
    }

    /**
     * Store a newly created Rotas in storage.
     * POST /rotas
     *
     * @param CreateRotasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRotasAPIRequest $request)
    {
        $input = $request->all();

        $rotas = $this->rotasRepository->create($input);

        return $this->sendResponse($rotas->toArray(), 'Rotas saved successfully');
    }

    /**
     * Display the specified Rotas.
     * GET|HEAD /rotas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Rotas $rotas */
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            return $this->sendError('Rotas not found');
        }

        return $this->sendResponse($rotas->toArray(), 'Rotas retrieved successfully');
    }

    /**
     * Update the specified Rotas in storage.
     * PUT/PATCH /rotas/{id}
     *
     * @param  int $id
     * @param UpdateRotasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRotasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Rotas $rotas */
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            return $this->sendError('Rotas not found');
        }

        $rotas = $this->rotasRepository->update($input, $id);

        return $this->sendResponse($rotas->toArray(), 'Rotas updated successfully');
    }

    /**
     * Remove the specified Rotas from storage.
     * DELETE /rotas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Rotas $rotas */
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            return $this->sendError('Rotas not found');
        }

        $rotas->delete();

        return $this->sendResponse($id, 'Rotas deleted successfully');
    }
}

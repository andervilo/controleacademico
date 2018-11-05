<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEscolasAPIRequest;
use App\Http\Requests\API\UpdateEscolasAPIRequest;
use App\Models\Escolas;
use App\Repositories\EscolasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class EscolasController
 * @package App\Http\Controllers\API
 */

class EscolasAPIController extends AppBaseController
{
    /** @var  EscolasRepository */
    private $escolasRepository;

    public function __construct(EscolasRepository $escolasRepo)
    {
        $this->escolasRepository = $escolasRepo;
    }

    /**
     * Display a listing of the Escolas.
     * GET|HEAD /escolas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->escolasRepository->pushCriteria(new RequestCriteria($request));
        $this->escolasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $escolas = $this->escolasRepository->all();

        return $this->sendResponse($escolas->toArray(), 'Escolas retrieved successfully');
    }

    /**
     * Store a newly created Escolas in storage.
     * POST /escolas
     *
     * @param CreateEscolasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateEscolasAPIRequest $request)
    {
        $input = $request->all();

        $escolas = $this->escolasRepository->create($input);

        return $this->sendResponse($escolas->toArray(), 'Escolas saved successfully');
    }

    /**
     * Display the specified Escolas.
     * GET|HEAD /escolas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Escolas $escolas */
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            return $this->sendError('Escolas not found');
        }

        return $this->sendResponse($escolas->toArray(), 'Escolas retrieved successfully');
    }

    /**
     * Update the specified Escolas in storage.
     * PUT/PATCH /escolas/{id}
     *
     * @param  int $id
     * @param UpdateEscolasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEscolasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Escolas $escolas */
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            return $this->sendError('Escolas not found');
        }

        $escolas = $this->escolasRepository->update($input, $id);

        return $this->sendResponse($escolas->toArray(), 'Escolas updated successfully');
    }

    /**
     * Remove the specified Escolas from storage.
     * DELETE /escolas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Escolas $escolas */
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            return $this->sendError('Escolas not found');
        }

        $escolas->delete();

        return $this->sendResponse($id, 'Escolas deleted successfully');
    }
}

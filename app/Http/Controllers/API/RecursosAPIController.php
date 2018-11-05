<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateRecursosAPIRequest;
use App\Http\Requests\API\UpdateRecursosAPIRequest;
use App\Models\Recursos;
use App\Repositories\RecursosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class RecursosController
 * @package App\Http\Controllers\API
 */

class RecursosAPIController extends AppBaseController
{
    /** @var  RecursosRepository */
    private $recursosRepository;

    public function __construct(RecursosRepository $recursosRepo)
    {
        $this->recursosRepository = $recursosRepo;
    }

    /**
     * Display a listing of the Recursos.
     * GET|HEAD /recursos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->recursosRepository->pushCriteria(new RequestCriteria($request));
        $this->recursosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $recursos = $this->recursosRepository->all();

        return $this->sendResponse($recursos->toArray(), 'Recursos retrieved successfully');
    }

    /**
     * Store a newly created Recursos in storage.
     * POST /recursos
     *
     * @param CreateRecursosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateRecursosAPIRequest $request)
    {
        $input = $request->all();

        $recursos = $this->recursosRepository->create($input);

        return $this->sendResponse($recursos->toArray(), 'Recursos saved successfully');
    }

    /**
     * Display the specified Recursos.
     * GET|HEAD /recursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Recursos $recursos */
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            return $this->sendError('Recursos not found');
        }

        return $this->sendResponse($recursos->toArray(), 'Recursos retrieved successfully');
    }

    /**
     * Update the specified Recursos in storage.
     * PUT/PATCH /recursos/{id}
     *
     * @param  int $id
     * @param UpdateRecursosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecursosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Recursos $recursos */
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            return $this->sendError('Recursos not found');
        }

        $recursos = $this->recursosRepository->update($input, $id);

        return $this->sendResponse($recursos->toArray(), 'Recursos updated successfully');
    }

    /**
     * Remove the specified Recursos from storage.
     * DELETE /recursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Recursos $recursos */
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            return $this->sendError('Recursos not found');
        }

        $recursos->delete();

        return $this->sendResponse($id, 'Recursos deleted successfully');
    }
}

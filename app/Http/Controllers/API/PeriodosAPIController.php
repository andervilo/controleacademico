<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePeriodosAPIRequest;
use App\Http\Requests\API\UpdatePeriodosAPIRequest;
use App\Models\Periodos;
use App\Repositories\PeriodosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PeriodosController
 * @package App\Http\Controllers\API
 */

class PeriodosAPIController extends AppBaseController
{
    /** @var  PeriodosRepository */
    private $periodosRepository;

    public function __construct(PeriodosRepository $periodosRepo)
    {
        $this->periodosRepository = $periodosRepo;
    }

    /**
     * Display a listing of the Periodos.
     * GET|HEAD /periodos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodosRepository->pushCriteria(new RequestCriteria($request));
        $this->periodosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $periodos = $this->periodosRepository->all();

        return $this->sendResponse($periodos->toArray(), 'Periodos retrieved successfully');
    }

    /**
     * Store a newly created Periodos in storage.
     * POST /periodos
     *
     * @param CreatePeriodosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodosAPIRequest $request)
    {
        $input = $request->all();

        $periodos = $this->periodosRepository->create($input);

        return $this->sendResponse($periodos->toArray(), 'Periodos saved successfully');
    }

    /**
     * Display the specified Periodos.
     * GET|HEAD /periodos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Periodos $periodos */
        $periodos = $this->periodosRepository->findWithoutFail($id);

        if (empty($periodos)) {
            return $this->sendError('Periodos not found');
        }

        return $this->sendResponse($periodos->toArray(), 'Periodos retrieved successfully');
    }

    /**
     * Update the specified Periodos in storage.
     * PUT/PATCH /periodos/{id}
     *
     * @param  int $id
     * @param UpdatePeriodosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Periodos $periodos */
        $periodos = $this->periodosRepository->findWithoutFail($id);

        if (empty($periodos)) {
            return $this->sendError('Periodos not found');
        }

        $periodos = $this->periodosRepository->update($input, $id);

        return $this->sendResponse($periodos->toArray(), 'Periodos updated successfully');
    }

    /**
     * Remove the specified Periodos from storage.
     * DELETE /periodos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Periodos $periodos */
        $periodos = $this->periodosRepository->findWithoutFail($id);

        if (empty($periodos)) {
            return $this->sendError('Periodos not found');
        }

        $periodos->delete();

        return $this->sendResponse($id, 'Periodos deleted successfully');
    }
}

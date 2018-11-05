<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTesteAPIRequest;
use App\Http\Requests\API\UpdateTesteAPIRequest;
use App\Models\Teste;
use App\Repositories\TesteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TesteController
 * @package App\Http\Controllers\API
 */

class TesteAPIController extends AppBaseController
{
    /** @var  TesteRepository */
    private $testeRepository;

    public function __construct(TesteRepository $testeRepo)
    {
        $this->testeRepository = $testeRepo;
    }

    /**
     * Display a listing of the Teste.
     * GET|HEAD /testes
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->testeRepository->pushCriteria(new RequestCriteria($request));
        $this->testeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $testes = $this->testeRepository->all();

        return $this->sendResponse($testes->toArray(), 'Testes retrieved successfully');
    }

    /**
     * Store a newly created Teste in storage.
     * POST /testes
     *
     * @param CreateTesteAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTesteAPIRequest $request)
    {
        $input = $request->all();

        $testes = $this->testeRepository->create($input);

        return $this->sendResponse($testes->toArray(), 'Teste saved successfully');
    }

    /**
     * Display the specified Teste.
     * GET|HEAD /testes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Teste $teste */
        $teste = $this->testeRepository->findWithoutFail($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        return $this->sendResponse($teste->toArray(), 'Teste retrieved successfully');
    }

    /**
     * Update the specified Teste in storage.
     * PUT/PATCH /testes/{id}
     *
     * @param  int $id
     * @param UpdateTesteAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTesteAPIRequest $request)
    {
        $input = $request->all();

        /** @var Teste $teste */
        $teste = $this->testeRepository->findWithoutFail($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        $teste = $this->testeRepository->update($input, $id);

        return $this->sendResponse($teste->toArray(), 'Teste updated successfully');
    }

    /**
     * Remove the specified Teste from storage.
     * DELETE /testes/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Teste $teste */
        $teste = $this->testeRepository->findWithoutFail($id);

        if (empty($teste)) {
            return $this->sendError('Teste not found');
        }

        $teste->delete();

        return $this->sendResponse($id, 'Teste deleted successfully');
    }
}

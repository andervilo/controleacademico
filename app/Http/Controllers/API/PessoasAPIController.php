<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePessoasAPIRequest;
use App\Http\Requests\API\UpdatePessoasAPIRequest;
use App\Models\Pessoas;
use App\Repositories\PessoasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class PessoasController
 * @package App\Http\Controllers\API
 */

class PessoasAPIController extends AppBaseController
{
    /** @var  PessoasRepository */
    private $pessoasRepository;

    public function __construct(PessoasRepository $pessoasRepo)
    {
        $this->pessoasRepository = $pessoasRepo;
    }

    /**
     * Display a listing of the Pessoas.
     * GET|HEAD /pessoas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pessoasRepository->pushCriteria(new RequestCriteria($request));
        $this->pessoasRepository->pushCriteria(new LimitOffsetCriteria($request));
        $pessoas = $this->pessoasRepository->all();

        return $this->sendResponse($pessoas->toArray(), 'Pessoas retrieved successfully');
    }

    /**
     * Store a newly created Pessoas in storage.
     * POST /pessoas
     *
     * @param CreatePessoasAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatePessoasAPIRequest $request)
    {
        $input = $request->all();

        $pessoas = $this->pessoasRepository->create($input);

        return $this->sendResponse($pessoas->toArray(), 'Pessoas saved successfully');
    }

    /**
     * Display the specified Pessoas.
     * GET|HEAD /pessoas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Pessoas $pessoas */
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            return $this->sendError('Pessoas not found');
        }

        return $this->sendResponse($pessoas->toArray(), 'Pessoas retrieved successfully');
    }

    /**
     * Update the specified Pessoas in storage.
     * PUT/PATCH /pessoas/{id}
     *
     * @param  int $id
     * @param UpdatePessoasAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePessoasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Pessoas $pessoas */
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            return $this->sendError('Pessoas not found');
        }

        $pessoas = $this->pessoasRepository->update($input, $id);

        return $this->sendResponse($pessoas->toArray(), 'Pessoas updated successfully');
    }

    /**
     * Remove the specified Pessoas from storage.
     * DELETE /pessoas/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Pessoas $pessoas */
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            return $this->sendError('Pessoas not found');
        }

        $pessoas->delete();

        return $this->sendResponse($id, 'Pessoas deleted successfully');
    }
}

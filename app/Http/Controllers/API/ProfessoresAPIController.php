<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateProfessoresAPIRequest;
use App\Http\Requests\API\UpdateProfessoresAPIRequest;
use App\Models\Professores;
use App\Repositories\ProfessoresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ProfessoresController
 * @package App\Http\Controllers\API
 */

class ProfessoresAPIController extends AppBaseController
{
    /** @var  ProfessoresRepository */
    private $professoresRepository;

    public function __construct(ProfessoresRepository $professoresRepo)
    {
        $this->professoresRepository = $professoresRepo;
    }

    /**
     * Display a listing of the Professores.
     * GET|HEAD /professores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->professoresRepository->pushCriteria(new RequestCriteria($request));
        $this->professoresRepository->pushCriteria(new LimitOffsetCriteria($request));
        $professores = $this->professoresRepository->all();

        return $this->sendResponse($professores->toArray(), 'Professores retrieved successfully');
    }

    /**
     * Store a newly created Professores in storage.
     * POST /professores
     *
     * @param CreateProfessoresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateProfessoresAPIRequest $request)
    {
        $input = $request->all();

        $professores = $this->professoresRepository->create($input);

        return $this->sendResponse($professores->toArray(), 'Professores saved successfully');
    }

    /**
     * Display the specified Professores.
     * GET|HEAD /professores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Professores $professores */
        $professores = $this->professoresRepository->findWithoutFail($id);

        if (empty($professores)) {
            return $this->sendError('Professores not found');
        }

        return $this->sendResponse($professores->toArray(), 'Professores retrieved successfully');
    }

    /**
     * Update the specified Professores in storage.
     * PUT/PATCH /professores/{id}
     *
     * @param  int $id
     * @param UpdateProfessoresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfessoresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Professores $professores */
        $professores = $this->professoresRepository->findWithoutFail($id);

        if (empty($professores)) {
            return $this->sendError('Professores not found');
        }

        $professores = $this->professoresRepository->update($input, $id);

        return $this->sendResponse($professores->toArray(), 'Professores updated successfully');
    }

    /**
     * Remove the specified Professores from storage.
     * DELETE /professores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Professores $professores */
        $professores = $this->professoresRepository->findWithoutFail($id);

        if (empty($professores)) {
            return $this->sendError('Professores not found');
        }

        $professores->delete();

        return $this->sendResponse($id, 'Professores deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDiretoresAPIRequest;
use App\Http\Requests\API\UpdateDiretoresAPIRequest;
use App\Models\Diretores;
use App\Repositories\DiretoresRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DiretoresController
 * @package App\Http\Controllers\API
 */

class DiretoresAPIController extends AppBaseController
{
    /** @var  DiretoresRepository */
    private $diretoresRepository;

    public function __construct(DiretoresRepository $diretoresRepo)
    {
        $this->diretoresRepository = $diretoresRepo;
    }

    /**
     * Display a listing of the Diretores.
     * GET|HEAD /diretores
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->diretoresRepository->pushCriteria(new RequestCriteria($request));
        $this->diretoresRepository->pushCriteria(new LimitOffsetCriteria($request));
        $diretores = $this->diretoresRepository->with('pessoa')->all();

        return $this->sendResponse($diretores->toArray(), 'Diretores retrieved successfully');
    }

    /**
     * Store a newly created Diretores in storage.
     * POST /diretores
     *
     * @param CreateDiretoresAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDiretoresAPIRequest $request)
    {
        $input = $request->all();

        $diretores = $this->diretoresRepository->create($input);

        return $this->sendResponse($diretores->toArray(), 'Diretores saved successfully');
    }

    /**
     * Display the specified Diretores.
     * GET|HEAD /diretores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Diretores $diretores */
        $diretores = $this->diretoresRepository->with('pessoa')->find($id);
        if (count($diretores->toArray())==0) {
            //return $this->sendError('Diretores not found');
            return response()->json([
                'success' => true,
                'message' => 'Diretores not found'
            ]);
        }
        return response()->json([
            'success'=> true,
            'data'=>$diretores->toArray()
        ]);
        //return $this->sendResponse($diretores->toArray(), 'Diretores retrieved successfully');
    }

    /**
     * Update the specified Diretores in storage.
     * PUT/PATCH /diretores/{id}
     *
     * @param  int $id
     * @param UpdateDiretoresAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiretoresAPIRequest $request)
    {
        $input = $request->all();

        /** @var Diretores $diretores */
        $diretores = $this->diretoresRepository->findWithoutFail($id);

        if (empty($diretores)) {
            return $this->sendError('Diretores not found');
        }

        $diretores = $this->diretoresRepository->update($input, $id);

        return $this->sendResponse($diretores->toArray(), 'Diretores updated successfully');
    }

    /**
     * Remove the specified Diretores from storage.
     * DELETE /diretores/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Diretores $diretores */
        $diretores = $this->diretoresRepository->findWithoutFail($id);

        if (empty($diretores)) {
            return $this->sendError('Diretores not found');
        }

        $diretores->delete();

        return $this->sendResponse($id, 'Diretores deleted successfully');
    }
}

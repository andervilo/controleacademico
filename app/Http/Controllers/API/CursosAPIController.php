<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCursosAPIRequest;
use App\Http\Requests\API\UpdateCursosAPIRequest;
use App\Models\Cursos;
use App\Repositories\CursosRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class CursosController
 * @package App\Http\Controllers\API
 */

class CursosAPIController extends AppBaseController
{
    /** @var  CursosRepository */
    private $cursosRepository;

    public function __construct(CursosRepository $cursosRepo)
    {
        $this->cursosRepository = $cursosRepo;
    }

    /**
     * Display a listing of the Cursos.
     * GET|HEAD /cursos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cursosRepository->pushCriteria(new RequestCriteria($request));
        $this->cursosRepository->pushCriteria(new LimitOffsetCriteria($request));
        $cursos = $this->cursosRepository->all();

        return $this->sendResponse($cursos->toArray(), 'Cursos retrieved successfully');
    }

    /**
     * Store a newly created Cursos in storage.
     * POST /cursos
     *
     * @param CreateCursosAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCursosAPIRequest $request)
    {
        $input = $request->all();

        $cursos = $this->cursosRepository->create($input);

        return $this->sendResponse($cursos->toArray(), 'Cursos saved successfully');
    }

    /**
     * Display the specified Cursos.
     * GET|HEAD /cursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cursos $cursos */
        $cursos = $this->cursosRepository->with('professores')->find($id);

        if (empty($cursos)) {
            return $this->sendError('Cursos not found');
        }

        return $this->sendResponse($cursos->toArray(), 'Cursos retrieved successfully');
    }

    /**
     * Update the specified Cursos in storage.
     * PUT/PATCH /cursos/{id}
     *
     * @param  int $id
     * @param UpdateCursosAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursosAPIRequest $request)
    {
        $input = $request->all();

        /** @var Cursos $cursos */
        $cursos = $this->cursosRepository->findWithoutFail($id);

        if (empty($cursos)) {
            return $this->sendError('Cursos not found');
        }

        $cursos = $this->cursosRepository->update($input, $id);

        return $this->sendResponse($cursos->toArray(), 'Cursos updated successfully');
    }

    /**
     * Remove the specified Cursos from storage.
     * DELETE /cursos/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cursos $cursos */
        $cursos = $this->cursosRepository->findWithoutFail($id);

        if (empty($cursos)) {
            return $this->sendError('Cursos not found');
        }

        $cursos->delete();

        return $this->sendResponse($id, 'Cursos deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNotaFrequenciaAPIRequest;
use App\Http\Requests\API\UpdateNotaFrequenciaAPIRequest;
use App\Models\NotaFrequencia;
use App\Repositories\NotaFrequenciaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NotaFrequenciaController
 * @package App\Http\Controllers\API
 */

class NotaFrequenciaAPIController extends AppBaseController
{
    /** @var  NotaFrequenciaRepository */
    private $notaFrequenciaRepository;

    public function __construct(NotaFrequenciaRepository $notaFrequenciaRepo)
    {
        $this->notaFrequenciaRepository = $notaFrequenciaRepo;
    }

    /**
     * Display a listing of the NotaFrequencia.
     * GET|HEAD /notaFrequencias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->notaFrequenciaRepository->pushCriteria(new RequestCriteria($request));
        $this->notaFrequenciaRepository->pushCriteria(new LimitOffsetCriteria($request));
        $notaFrequencias = $this->notaFrequenciaRepository->all();

        return $this->sendResponse($notaFrequencias->toArray(), 'Nota Frequencias retrieved successfully');
    }

    /**
     * Store a newly created NotaFrequencia in storage.
     * POST /notaFrequencias
     *
     * @param CreateNotaFrequenciaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateNotaFrequenciaAPIRequest $request)
    {
        $input = $request->all();

        $notaFrequencias = $this->notaFrequenciaRepository->create($input);

        return $this->sendResponse($notaFrequencias->toArray(), 'Nota Frequencia saved successfully');
    }

    /**
     * Display the specified NotaFrequencia.
     * GET|HEAD /notaFrequencias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var NotaFrequencia $notaFrequencia */
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            return $this->sendError('Nota Frequencia not found');
        }

        return $this->sendResponse($notaFrequencia->toArray(), 'Nota Frequencia retrieved successfully');
    }

    /**
     * Update the specified NotaFrequencia in storage.
     * PUT/PATCH /notaFrequencias/{id}
     *
     * @param  int $id
     * @param UpdateNotaFrequenciaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotaFrequenciaAPIRequest $request)
    {
        $input = $request->all();

        /** @var NotaFrequencia $notaFrequencia */
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            return $this->sendError('Nota Frequencia not found');
        }

        $notaFrequencia = $this->notaFrequenciaRepository->update($input, $id);

        return $this->sendResponse($notaFrequencia->toArray(), 'NotaFrequencia updated successfully');
    }

    /**
     * Remove the specified NotaFrequencia from storage.
     * DELETE /notaFrequencias/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var NotaFrequencia $notaFrequencia */
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            return $this->sendError('Nota Frequencia not found');
        }

        $notaFrequencia->delete();

        return $this->sendResponse($id, 'Nota Frequencia deleted successfully');
    }
}

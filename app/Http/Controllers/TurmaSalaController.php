<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmaSalaRequest;
use App\Http\Requests\UpdateTurmaSalaRequest;
use App\Repositories\TurmaSalaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TurmaSalaController extends AppBaseController
{
    /** @var  TurmaSalaRepository */
    private $turmaSalaRepository;

    public function __construct(TurmaSalaRepository $turmaSalaRepo)
    {
        $this->turmaSalaRepository = $turmaSalaRepo;
    }

    /**
     * Display a listing of the TurmaSala.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->turmaSalaRepository->pushCriteria(new RequestCriteria($request));
        $turmaSalas = $this->turmaSalaRepository->all();

        return view('turma_salas.index')
            ->with('turmaSalas', $turmaSalas);
    }

    /**
     * Show the form for creating a new TurmaSala.
     *
     * @return Response
     */
    public function create()
    {
        return view('turma_salas.create');
    }

    /**
     * Store a newly created TurmaSala in storage.
     *
     * @param CreateTurmaSalaRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmaSalaRequest $request)
    {
        $input = $request->all();

        $turmaSala = $this->turmaSalaRepository->create($input);

        Flash::success('Turma Sala saved successfully.');

        return redirect(route('turmaSalas.index'));
    }

    /**
     * Display the specified TurmaSala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            Flash::error('Turma Sala not found');

            return redirect(route('turmaSalas.index'));
        }

        return view('turma_salas.show')->with('turmaSala', $turmaSala);
    }

    /**
     * Show the form for editing the specified TurmaSala.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            Flash::error('Turma Sala not found');

            return redirect(route('turmaSalas.index'));
        }

        return view('turma_salas.edit')->with('turmaSala', $turmaSala);
    }

    /**
     * Update the specified TurmaSala in storage.
     *
     * @param  int              $id
     * @param UpdateTurmaSalaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmaSalaRequest $request)
    {
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            Flash::error('Turma Sala not found');

            return redirect(route('turmaSalas.index'));
        }

        $turmaSala = $this->turmaSalaRepository->update($request->all(), $id);

        Flash::success('Turma Sala updated successfully.');

        return redirect(route('turmaSalas.index'));
    }

    /**
     * Remove the specified TurmaSala from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $turmaSala = $this->turmaSalaRepository->findWithoutFail($id);

        if (empty($turmaSala)) {
            Flash::error('Turma Sala not found');

            return redirect(route('turmaSalas.index'));
        }

        $this->turmaSalaRepository->delete($id);

        Flash::success('Turma Sala deleted successfully.');

        return redirect(route('turmaSalas.index'));
    }
}

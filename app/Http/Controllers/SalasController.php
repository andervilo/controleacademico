<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSalasRequest;
use App\Http\Requests\UpdateSalasRequest;
use App\Repositories\SalasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SalasController extends AppBaseController
{
    /** @var  SalasRepository */
    private $salasRepository;

    public function __construct(SalasRepository $salasRepo)
    {
        $this->salasRepository = $salasRepo;
    }

    /**
     * Display a listing of the Salas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salasRepository->pushCriteria(new RequestCriteria($request));
        $salas = $this->salasRepository->all();

        return view('salas.index')
            ->with('salas', $salas);
    }

    /**
     * Show the form for creating a new Salas.
     *
     * @return Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created Salas in storage.
     *
     * @param CreateSalasRequest $request
     *
     * @return Response
     */
    public function store(CreateSalasRequest $request)
    {
        $input = $request->all();

        $salas = $this->salasRepository->create($input);

        Flash::success('Salas saved successfully.');

        return redirect(route('salas.index'));
    }

    /**
     * Display the specified Salas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            Flash::error('Salas not found');

            return redirect(route('salas.index'));
        }

        return view('salas.show')->with('salas', $salas);
    }

    /**
     * Show the form for editing the specified Salas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            Flash::error('Salas not found');

            return redirect(route('salas.index'));
        }

        return view('salas.edit')->with('salas', $salas);
    }

    /**
     * Update the specified Salas in storage.
     *
     * @param  int              $id
     * @param UpdateSalasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalasRequest $request)
    {
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            Flash::error('Salas not found');

            return redirect(route('salas.index'));
        }

        $salas = $this->salasRepository->update($request->all(), $id);

        Flash::success('Salas updated successfully.');

        return redirect(route('salas.index'));
    }

    /**
     * Remove the specified Salas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salas = $this->salasRepository->findWithoutFail($id);

        if (empty($salas)) {
            Flash::error('Salas not found');

            return redirect(route('salas.index'));
        }

        $this->salasRepository->delete($id);

        Flash::success('Salas deleted successfully.');

        return redirect(route('salas.index'));
    }
}

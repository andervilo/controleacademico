<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecursosRequest;
use App\Http\Requests\UpdateRecursosRequest;
use App\Repositories\RecursosRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RecursosController extends AppBaseController
{
    /** @var  RecursosRepository */
    private $recursosRepository;

    public function __construct(RecursosRepository $recursosRepo)
    {
        $this->recursosRepository = $recursosRepo;
    }

    /**
     * Display a listing of the Recursos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->recursosRepository->pushCriteria(new RequestCriteria($request));
        $recursos = $this->recursosRepository->all();

        return view('recursos.index')
            ->with('recursos', $recursos);
    }

    /**
     * Show the form for creating a new Recursos.
     *
     * @return Response
     */
    public function create()
    {
        return view('recursos.create');
    }

    /**
     * Store a newly created Recursos in storage.
     *
     * @param CreateRecursosRequest $request
     *
     * @return Response
     */
    public function store(CreateRecursosRequest $request)
    {
        $input = $request->all();

        $recursos = $this->recursosRepository->create($input);

        Flash::success('Recursos saved successfully.');

        return redirect(route('recursos.index'));
    }

    /**
     * Display the specified Recursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            Flash::error('Recursos not found');

            return redirect(route('recursos.index'));
        }

        return view('recursos.show')->with('recursos', $recursos);
    }

    /**
     * Show the form for editing the specified Recursos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            Flash::error('Recursos not found');

            return redirect(route('recursos.index'));
        }

        return view('recursos.edit')->with('recursos', $recursos);
    }

    /**
     * Update the specified Recursos in storage.
     *
     * @param  int              $id
     * @param UpdateRecursosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRecursosRequest $request)
    {
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            Flash::error('Recursos not found');

            return redirect(route('recursos.index'));
        }

        $recursos = $this->recursosRepository->update($request->all(), $id);

        Flash::success('Recursos updated successfully.');

        return redirect(route('recursos.index'));
    }

    /**
     * Remove the specified Recursos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $recursos = $this->recursosRepository->findWithoutFail($id);

        if (empty($recursos)) {
            Flash::error('Recursos not found');

            return redirect(route('recursos.index'));
        }

        $this->recursosRepository->delete($id);

        Flash::success('Recursos deleted successfully.');

        return redirect(route('recursos.index'));
    }
}

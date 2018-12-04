<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRotasRequest;
use App\Http\Requests\UpdateRotasRequest;
use App\Repositories\RotasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class RotasController extends AppBaseController
{
    /** @var  RotasRepository */
    private $rotasRepository;

    public function __construct(RotasRepository $rotasRepo)
    {
        $this->rotasRepository = $rotasRepo;
    }

    /**
     * Display a listing of the Rotas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->rotasRepository->pushCriteria(new RequestCriteria($request));
        $rotas = $this->rotasRepository->scopeQuery(function($query){
            return $query
            ->where('uri','NOT LIKE','%api%')
            ->orderBy('uri','ASC');
        })->paginate(10);
        
        //$rotas = $this->rotasRepository->findWhere([['uri','NOT LIKE','api']])->paginate(10);
    
        return view('rotas.index',['rotas'=> $rotas]);
    }

    /**
     * Show the form for creating a new Rotas.
     *
     * @return Response
     */
    public function create()
    {
        return view('rotas.create');
    }

    /**
     * Store a newly created Rotas in storage.
     *
     * @param CreateRotasRequest $request
     *
     * @return Response
     */
    public function store(CreateRotasRequest $request)
    {
        $input = $request->all();

        $rotas = $this->rotasRepository->create($input);

        Flash::success('Rotas saved successfully.');

        return redirect(route('rotas.index'));
    }

    /**
     * Display the specified Rotas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            Flash::error('Rotas not found');

            return redirect(route('rotas.index'));
        }

        return view('rotas.show')->with('rotas', $rotas);
    }

    /**
     * Show the form for editing the specified Rotas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            Flash::error('Rotas not found');

            return redirect(route('rotas.index'));
        }

        return view('rotas.edit')->with('rotas', $rotas);
    }

    /**
     * Update the specified Rotas in storage.
     *
     * @param  int              $id
     * @param UpdateRotasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateRotasRequest $request)
    {
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            Flash::error('Rotas not found');

            return redirect(route('rotas.index'));
        }

        $rotas = $this->rotasRepository->update($request->all(), $id);

        Flash::success('Rotas updated successfully.');

        return redirect(route('rotas.index'));
    }

    /**
     * Remove the specified Rotas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $rotas = $this->rotasRepository->findWithoutFail($id);

        if (empty($rotas)) {
            Flash::error('Rotas not found');

            return redirect(route('rotas.index'));
        }

        $this->rotasRepository->delete($id);

        Flash::success('Rotas deleted successfully.');

        return redirect(route('rotas.index'));
    }
}

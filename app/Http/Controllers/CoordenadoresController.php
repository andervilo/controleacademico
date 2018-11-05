<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCoordenadoresRequest;
use App\Http\Requests\UpdateCoordenadoresRequest;
use App\Repositories\CoordenadoresRepository;
use App\Repositories\PessoasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CoordenadoresController extends AppBaseController
{
    /** @var  CoordenadoresRepository */
    private $coordenadoresRepository;
    private $pessoasRepository;

    public function __construct(CoordenadoresRepository $coordenadoresRepo, PessoasRepository $pessoasRepo)
    {
        $this->coordenadoresRepository = $coordenadoresRepo;
        $this->pessoasRepository = $pessoasRepo;
    }

    /**
     * Display a listing of the Coordenadores.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->coordenadoresRepository->pushCriteria(new RequestCriteria($request));
        $coordenadores = $this->coordenadoresRepository->with('pessoa')->all();

        return view('coordenadores.index')
            ->with('coordenadores', $coordenadores);
    }

    /**
     * Show the form for creating a new Coordenadores.
     *
     * @return Response
     */
    public function create()
    {
        return view('coordenadores.create');
    }

    /**
     * Store a newly created Coordenadores in storage.
     *
     * @param CreateCoordenadoresRequest $request
     *
     * @return Response
     */
    public function store(CreateCoordenadoresRequest $request)
    {
        $input = $request->all();
        //dd($input);
        $pessoa = $this->pessoasRepository->create($input);
        $input['pessoa_id'] = $pessoa->id;

        $coordenadores = $this->coordenadoresRepository->create($input);

        Flash::success('Coordenador adicionado com sucesso!');

        return redirect(route('coordenadores.index'));
    }

    /**
     * Display the specified Coordenadores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $coordenadores = $this->coordenadoresRepository->with('pessoa')->find($id);

        if (empty($coordenadores)) {
            Flash::error('Coordenadores not found');

            return redirect(route('coordenadores.index'));
        }

        return view('coordenadores.show')->with('coordenadores', $coordenadores);
    }

    /**
     * Show the form for editing the specified Coordenadores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $coordenadores = $this->coordenadoresRepository->with('pessoa')->find($id);

        if (empty($coordenadores)) {
            Flash::error('Coordenadores not found');

            return redirect(route('coordenadores.index'));
        }

        return view('coordenadores.edit')->with('coordenadores', $coordenadores);
    }

    /**
     * Update the specified Coordenadores in storage.
     *
     * @param  int              $id
     * @param UpdateCoordenadoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCoordenadoresRequest $request)
    {
        $coordenadores = $this->coordenadoresRepository->findWithoutFail($id);

        if (empty($coordenadores)) {
            Flash::error('Coordenadores not found');

            return redirect(route('coordenadores.index'));
        }
        $pessoa_id = $request->all()['pessoa_id'];
        $pessoa  = $this->pessoasRepository->update($request->all(), $pessoa_id);
        $coordenadores = $this->coordenadoresRepository->update($request->all(), $id);

        Flash::success('Coordenadores updated successfully.');

        return redirect(route('coordenadores.index'));
    }

    /**
     * Remove the specified Coordenadores from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $coordenadores = $this->coordenadoresRepository->findWithoutFail($id);

        if (empty($coordenadores)) {
            Flash::error('Coordenadores not found');

            return redirect(route('coordenadores.index'));
        }

        $this->coordenadoresRepository->delete($id);

        Flash::success('Coordenadores deleted successfully.');

        return redirect(route('coordenadores.index'));
    }
}

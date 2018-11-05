<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEscolasRequest;
use App\Http\Requests\UpdateEscolasRequest;
use App\Repositories\EscolasRepository;
use App\Repositories\DiretoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class EscolasController extends AppBaseController
{
    /** @var  EscolasRepository */
    private $escolasRepository;
    private $diretoresRepository;

    public function __construct(EscolasRepository $escolasRepo, DiretoresRepository $diretoresRepo)
    {
        $this->escolasRepository = $escolasRepo;
        $this->diretoresRepository = $diretoresRepo;
    }

    /**
     * Display a listing of the Escolas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->escolasRepository->pushCriteria(new RequestCriteria($request));
        $escolas = $this->escolasRepository->all();

        return view('escolas.index')
            ->with('escolas', $escolas);
    }

    /**
     * Show the form for creating a new Escolas.
     *
     * @return Response
     */
    public function create()
    {
        $diretores = $this->diretoresRepository->with('pessoa')->get()->pluck('pessoa.nome','id');
        //dd($diretores);
        return view('escolas.create',['diretores'=>$diretores]);
    }

    /**
     * Store a newly created Escolas in storage.
     *
     * @param CreateEscolasRequest $request
     *
     * @return Response
     */
    public function store(CreateEscolasRequest $request)
    {
        $input = $request->all();

        $escolas = $this->escolasRepository->create($input);

        Flash::success('Escola inserida com sucesso!');

        return redirect(route('escolas.index'));
    }

    /**
     * Display the specified Escolas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $escolas = $this->escolasRepository->with('diretor')->find($id);

        if (empty($escolas)) {
            Flash::error('Escolas not found');

            return redirect(route('escolas.index'));
        }

        return view('escolas.show')->with('escolas', $escolas);
    }

    /**
     * Show the form for editing the specified Escolas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            Flash::error('Escolas not found');

            return redirect(route('escolas.index'));
        }
        $diretores = $this->diretoresRepository->with('pessoa')->get()->pluck('pessoa.nome','id');
        return view('escolas.edit',['escolas'=>$escolas,'diretores'=>$diretores]);
    }

    /**
     * Update the specified Escolas in storage.
     *
     * @param  int              $id
     * @param UpdateEscolasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateEscolasRequest $request)
    {
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            Flash::error('Escolas not found');

            return redirect(route('escolas.index'));
        }

        $escolas = $this->escolasRepository->update($request->all(), $id);

        Flash::success('Escolas updated successfully.');

        return redirect(route('escolas.index'));
    }

    /**
     * Remove the specified Escolas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $escolas = $this->escolasRepository->findWithoutFail($id);

        if (empty($escolas)) {
            Flash::error('Escolas not found');

            return redirect(route('escolas.index'));
        }

        $this->escolasRepository->delete($id);

        Flash::success('Escolas deleted successfully.');

        return redirect(route('escolas.index'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDiretoresRequest;
use App\Http\Requests\UpdateDiretoresRequest;
use App\Repositories\DiretoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Repositories\PessoasRepository;

class DiretoresController extends AppBaseController
{
    /** @var  DiretoresRepository */
    private $diretoresRepository;
    private $pessoasRepository;

    public function __construct(DiretoresRepository $diretoresRepo, PessoasRepository $pessoasRepo)
    {
        $this->diretoresRepository = $diretoresRepo;
        $this->pessoasRepository = $pessoasRepo;
    }

    /**
     * Display a listing of the Diretores.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->diretoresRepository->pushCriteria(new RequestCriteria($request));
        $diretores = $this->diretoresRepository->with('pessoa')->all();

        return view('diretores.index')
            ->with('diretores', $diretores);
    }

    /**
     * Show the form for creating a new Diretores.
     *
     * @return Response
     */
    public function create()
    {
        return view('diretores.create');
    }

    /**
     * Store a newly created Diretores in storage.
     *
     * @param CreateDiretoresRequest $request
     *
     * @return Response
     */
    public function store(CreateDiretoresRequest $request)
    {
        $input = $request->all();
        $pessoa = $this->pessoasRepository->create($input);
        $input['pessoa_id'] = $pessoa->id;
        $diretores = $this->diretoresRepository->create($input);

        Flash::success('Novo Diretor adicionado com sucesso!');

        return redirect(route('diretores.index'));
    }

    /**
     * Display the specified Diretores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $diretores = $this->diretoresRepository->with('pessoa')->find($id);

        if (empty($diretores)) {
            Flash::error('Diretores not found');

            return redirect(route('diretores.index'));
        }

        return view('diretores.show')->with('diretores', $diretores);
    }

    /**
     * Show the form for editing the specified Diretores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $diretores = $this->diretoresRepository->with('pessoa')->find($id);
        //dd($diretores);
        if (empty($diretores)) {
            Flash::error('Diretores not found');

            return redirect(route('diretores.index'));
        }

        return view('diretores.edit')->with('dados', $diretores);
    }

    /**
     * Update the specified Diretores in storage.
     *
     * @param  int              $id
     * @param UpdateDiretoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiretoresRequest $request)
    {
        
        $diretor = $this->diretoresRepository->findWithoutFail($id);

        if (empty($diretor)) {
            Flash::error('Diretor não encontrado!');
            return redirect(route('diretores.index'));
        }
        //dd($request->all());
        $pessoa_id = $request->all()['pessoa_id'];
        $pessoa  = $this->pessoasRepository->update($request->all(), $pessoa_id);
        $diretor = $this->diretoresRepository->update($request->all(), $id);

        Flash::success('Diretor atualizado com sucesso!');

        return redirect(route('diretores.index'));
    }

    /**
     * Remove the specified Diretores from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $diretores = $this->diretoresRepository->findWithoutFail($id);

        if (empty($diretores)) {
            Flash::error('Diretores not found');

            return redirect(route('diretores.index'));
        }

        $this->diretoresRepository->delete($id);

        Flash::success('Diretores deleted successfully.');

        return redirect(route('diretores.index'));
    }
}

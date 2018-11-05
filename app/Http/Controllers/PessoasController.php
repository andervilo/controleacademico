<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePessoasRequest;
use App\Http\Requests\UpdatePessoasRequest;
use App\Repositories\PessoasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PessoasController extends AppBaseController
{
    /** @var  PessoasRepository */
    private $pessoasRepository;

    public function __construct(PessoasRepository $pessoasRepo)
    {
        $this->pessoasRepository = $pessoasRepo;
    }

    /**
     * Display a listing of the Pessoas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pessoasRepository->pushCriteria(new RequestCriteria($request));
        $pessoas = $this->pessoasRepository->all();

        return view('pessoas.index')
            ->with('pessoas', $pessoas);
    }

    /**
     * Show the form for creating a new Pessoas.
     *
     * @return Response
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created Pessoas in storage.
     *
     * @param CreatePessoasRequest $request
     *
     * @return Response
     */
    public function store(CreatePessoasRequest $request)
    {
        $input = $request->all();

        $pessoas = $this->pessoasRepository->create($input);

        Flash::success('Pessoas saved successfully.');

        return redirect(route('pessoas.index'));
    }

    /**
     * Display the specified Pessoas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            Flash::error('Pessoas not found');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.show')->with('pessoas', $pessoas);
    }

    /**
     * Show the form for editing the specified Pessoas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            Flash::error('Pessoas not found');

            return redirect(route('pessoas.index'));
        }

        return view('pessoas.edit')->with('pessoas', $pessoas);
    }

    /**
     * Update the specified Pessoas in storage.
     *
     * @param  int              $id
     * @param UpdatePessoasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePessoasRequest $request)
    {
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            Flash::error('Pessoas not found');

            return redirect(route('pessoas.index'));
        }

        $pessoas = $this->pessoasRepository->update($request->all(), $id);

        Flash::success('Pessoas updated successfully.');

        return redirect(route('pessoas.index'));
    }

    /**
     * Remove the specified Pessoas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pessoas = $this->pessoasRepository->findWithoutFail($id);

        if (empty($pessoas)) {
            Flash::error('Pessoas not found');

            return redirect(route('pessoas.index'));
        }

        $this->pessoasRepository->delete($id);

        Flash::success('Pessoas deleted successfully.');

        return redirect(route('pessoas.index'));
    }
}

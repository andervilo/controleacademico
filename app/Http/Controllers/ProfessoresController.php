<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfessoresRequest;
use App\Http\Requests\UpdateProfessoresRequest;
use App\Repositories\ProfessoresRepository;
use App\Repositories\PessoasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProfessoresController extends AppBaseController
{
    /** @var  ProfessoresRepository */
    private $professoresRepository;
    private $pessoasRepository;

    public function __construct(ProfessoresRepository $professoresRepo, PessoasRepository $pessoasRepo)
    {
        $this->professoresRepository = $professoresRepo;
        $this->pessoasRepository = $pessoasRepo;
    }

    /**
     * Display a listing of the Professores.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->professoresRepository->pushCriteria(new RequestCriteria($request));
        $q = $request->q;
        $professores = $this->professoresRepository
        ->with('pessoa')
        ->wherePessoa($q)
        ->paginate(10)
        ;

        return view('professores.index',['professores'=> $professores,'q'=>$q]);
    }

    /**
     * Show the form for creating a new Professores.
     *
     * @return Response
     */
    public function create()
    {
        return view('professores.create');
    }

    /**
     * Store a newly created Professores in storage.
     *
     * @param CreateProfessoresRequest $request
     *
     * @return Response
     */
    public function store(CreateProfessoresRequest $request)
    {
        $input = $request->all();
        $pessoa = $this->pessoasRepository->create($input);
        $input['pessoa_id'] = $pessoa->id;
        $professores = $this->professoresRepository->create($input);

        Flash::success('Professores saved successfully.');

        return redirect(route('professores.index'));
    }

    /**
     * Display the specified Professores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $professores = $this->professoresRepository->with('pessoa')->find($id);

        if (empty($professores)) {
            Flash::error('Professores not found');

            return redirect(route('professores.index'));
        }

        return view('professores.show')->with('professores', $professores);
    }

    /**
     * Show the form for editing the specified Professores.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $professores = $this->professoresRepository->with('pessoa')->find($id);

        if (empty($professores)) {
            Flash::error('Professores not found');

            return redirect(route('professores.index'));
        }

        return view('professores.edit')->with('professores', $professores);
    }

    /**
     * Update the specified Professores in storage.
     *
     * @param  int              $id
     * @param UpdateProfessoresRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfessoresRequest $request)
    {
        $professores = $this->professoresRepository->findWithoutFail($id);

        if (empty($professores)) {
            Flash::error('Professores not found');

            return redirect(route('professores.index'));
        }
        $pessoa_id = $request->all()['pessoa_id'];

        $pessoa  = $this->pessoasRepository->update($request->all(), $pessoa_id);
        $professores = $this->professoresRepository->update($request->all(), $id);

        Flash::success('Professores updated successfully.');

        return redirect(route('professores.index'));
    }

    /**
     * Remove the specified Professores from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $professores = $this->professoresRepository->findWithoutFail($id);

        if (empty($professores)) {
            Flash::error('Professores not found');

            return redirect(route('professores.index'));
        }

        $this->professoresRepository->delete($id);

        Flash::success('Professores deleted successfully.');

        return redirect(route('professores.index'));
    }
}

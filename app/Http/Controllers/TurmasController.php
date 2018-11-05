<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTurmasRequest;
use App\Http\Requests\UpdateTurmasRequest;
use App\Repositories\TurmasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TurmasController extends AppBaseController
{
    /** @var  TurmasRepository */
    private $turmasRepository;
    private $cursosRepository;
    private $professoresRepository;
    private $salasRepository;
    private $tsRepository;

    public function __construct(
            TurmasRepository $turmasRepo, 
            \App\Repositories\CursosRepository $cursosRepo,
            \App\Repositories\ProfessoresRepository $profRepo,
            \App\Repositories\SalasRepository $salasRepo,
            \App\Repositories\TurmaSalaRepository $tsRepo
            )
    {
        $this->turmasRepository = $turmasRepo;
        $this->cursosRepository = $cursosRepo;
        $this->professoresRepository = $profRepo;
        $this->salasRepository = $salasRepo;
        $this->tsRepository = $tsRepo;
    }

    /**
     * Display a listing of the Turmas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$id=null)
    {
        $this->turmasRepository->pushCriteria(new RequestCriteria($request));
        $turmas = $this->turmasRepository->findWhere(['curso_id'=>$id])->all();

        return view('turmas.index',['turmas'=> $turmas,'curso_id'=>$id]);
    }

    /**
     * Show the form for creating a new Turmas.
     *
     * @return Response
     */
    public function create($id=null)
    {
        $prof = $this->professoresRepository->all()->pluck('pessoa.nome','id')->toArray();
        array_unshift($prof, 'Selecione um Professor...');
        $cursos = $this->cursosRepository->findWhere(['id'=>$id])->pluck('nome','id');
        $salas = $this->salasRepository->all()->pluck('numero','id')->toArray();
        array_unshift($salas, 'Selecione uma Sala...');
        return view('turmas.create',
                [
                    'prof'=>$prof,
                    'cursos'=>$cursos,
                    'salas'=>$salas,
                    'curso_id'=>$id
                ]
            );
    }

    /**
     * Store a newly created Turmas in storage.
     *
     * @param CreateTurmasRequest $request
     *
     * @return Response
     */
    public function store(CreateTurmasRequest $request)
    {
        $input = $request->all();

        $turmas = $this->turmasRepository->create($input);
        $input['turma_id'] = $turmas->id;
        $turmaSala = $this->tsRepository->create($input);
        
        Flash::success('Turmas saved successfully.');

        return redirect(url('turmas',[$input['curso_id']]));
    }

    /**
     * Display the specified Turmas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            Flash::error('Turmas not found');

            return redirect(route('turmas.index'));
        }

        return view('turmas.show')->with('turmas', $turmas);
    }

    /**
     * Show the form for editing the specified Turmas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            Flash::error('Turmas not found');

            return redirect(route('turmas.index'));
        }
        $prof = $this->professoresRepository->all()->pluck('pessoa.nome','id')->toArray();
        //array_unshift($prof, 'Selecione um Professor...');
        $cursos = $this->cursosRepository->findWhere(['id'=>$turmas['curso_id']])->pluck('nome','id');
        $salas = $this->salasRepository->all()->pluck('numero','id')->toArray();
        array_unshift($salas, 'Selecione uma Sala...');

        return view('turmas.edit',
                [
                    'prof'=>$prof,
                    'cursos'=>$cursos,
                    'salas'=>$salas,
                    'turmas'=>$turmas,
                    'curso_id'=>$turmas['curso_id']
                ]
            );
    }

    /**
     * Update the specified Turmas in storage.
     *
     * @param  int              $id
     * @param UpdateTurmasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTurmasRequest $request)
    {
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            Flash::error('Turmas not found');

            return redirect(route('turmas.index'));
        }

        $turmas = $this->turmasRepository->update($request->all(), $id);

        Flash::success('Turmas updated successfully.');

        return redirect(url('turmas/curso',[$turmas->curso_id]));
    }

    /**
     * Remove the specified Turmas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $turmas = $this->turmasRepository->findWithoutFail($id);

        if (empty($turmas)) {
            Flash::error('Turmas not found');

            return redirect(route('turmas.index'));
        }

        $this->turmasRepository->delete($id);

        Flash::success('Turmas deleted successfully.');

        return redirect(route('turmas.index'));
    }
}

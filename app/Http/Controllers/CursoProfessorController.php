<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCursoProfessorRequest;
use App\Http\Requests\UpdateCursoProfessorRequest;
use App\Repositories\CursoProfessorRepository;
use App\Repositories\CursosRepository;
use App\Repositories\ProfessoresRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CursoProfessorController extends AppBaseController
{
    /** @var  CursoProfessorRepository */
    private $cursoProfessorRepository;
    private $cursoRepository;
    private $professorRepository;

    public function __construct(
            CursosRepository $cursoRepo,
            ProfessoresRepository $professorRepo,
            CursoProfessorRepository $cursoProfessorRepo
            )
    {
        $this->cursoProfessorRepository = $cursoProfessorRepo;
        $this->cursoRepository = $cursoRepo;
        $this->professorRepository = $professorRepo;
    }

    /**
     * Display a listing of the CursoProfessor.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->cursoProfessorRepository->pushCriteria(new RequestCriteria($request));
        $cursoProfessors = $this->cursoProfessorRepository->all();

        return view('curso_professors.index')
            ->with('cursoProfessors', $cursoProfessors);
    }

    /**
     * Show the form for creating a new CursoProfessor.
     *
     * @return Response
     */
    public function create($curso_id=null)
    {
        if($curso_id==null){
            $cursos = $this->cursoRepository->all()->pluck('nome','id');
            $cursos = $cursos->toArray();
            array_unshift($cursos,'Escolha um Curso...');
        }else{
            $cursos = $this->cursoRepository->find($curso_id)->pluck('nome','id');
            $cursos = $cursos->toArray();
        }
        
        $curprof = $this->cursoProfessorRepository->with('cursos')
                ->with('professores')
                ->findWhere(['curso_id'=>$curso_id])->all();
        //$curprof->load('cusrsos','professores');
        //dd($curprof);
        $professores = $this->professorRepository->with('pessoa')->all()->pluck('pessoa.nome','id');
        
        //dd($cursos->toArray());
        return view('curso_professors.create',['curprof'=>$curprof,'selectId'=>$curso_id,'cursos'=>$cursos,'professores'=>$professores]);
    }

    /**
     * Store a newly created CursoProfessor in storage.
     *
     * @param CreateCursoProfessorRequest $request
     *
     * @return Response
     */
    public function store(CreateCursoProfessorRequest $request)
    {
        $input = $request->all();
                
        $existe = $this->cursoProfessorRepository
                ->findWhere([
                    'curso_id'=>$input['curso_id'], 
                    'professor_id'=>$input['professor_id']
                ])->all();
        //dd($existe);
        if (!empty($existe)) {
            Flash::error('Curso Professor já relacionados');

            return redirect(url('cursoProfessors/create',[$input['curso_id']]));
        }

        $cursoProfessor = $this->cursoProfessorRepository->create($input);

        Flash::success('Curso Professor saved successfully.');

        return redirect(url('cursoProfessors/create',[$input['curso_id']]));
    }

    /**
     * Display the specified CursoProfessor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            Flash::error('Curso Professor not found');

            return redirect(route('cursoProfessors.index'));
        }

        return view('curso_professors.show')->with('cursoProfessor', $cursoProfessor);
    }

    /**
     * Show the form for editing the specified CursoProfessor.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            Flash::error('Curso Professor not found');

            return redirect(route('cursoProfessors.index'));
        }

        return view('curso_professors.edit')->with('cursoProfessor', $cursoProfessor);
    }

    /**
     * Update the specified CursoProfessor in storage.
     *
     * @param  int              $id
     * @param UpdateCursoProfessorRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCursoProfessorRequest $request)
    {
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);

        if (empty($cursoProfessor)) {
            Flash::error('Curso Professor not found');

            return redirect(route('cursoProfessors.index'));
        }

        $cursoProfessor = $this->cursoProfessorRepository->update($request->all(), $id);

        Flash::success('Curso Professor updated successfully.');

        return redirect(route('cursoProfessors.index'));
    }

    /**
     * Remove the specified CursoProfessor from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $cursoProfessor = $this->cursoProfessorRepository->findWithoutFail($id);
        $curso_id =$cursoProfessor->curso_id;
        if (empty($cursoProfessor)) {
            Flash::error('Curso Professor not found');

            return redirect(url('cursoProfessors/create',[$curso_id]));
        }

        $this->cursoProfessorRepository->delete($id);

        Flash::success('Relação Curso Professor excluida com sucesso!');

        return redirect(url('cursoProfessors/create',[$curso_id]));
    }
}

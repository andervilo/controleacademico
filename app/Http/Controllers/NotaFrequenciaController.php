<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateNotaFrequenciaRequest;
use App\Http\Requests\UpdateNotaFrequenciaRequest;
use App\Repositories\NotaFrequenciaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class NotaFrequenciaController extends AppBaseController
{
    /** @var  NotaFrequenciaRepository */
    private $notaFrequenciaRepository;

    public function __construct(NotaFrequenciaRepository $notaFrequenciaRepo)
    {
        $this->notaFrequenciaRepository = $notaFrequenciaRepo;
    }

    /**
     * Display a listing of the NotaFrequencia.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request,$id=null)
    {
        $this->notaFrequenciaRepository->pushCriteria(new RequestCriteria($request));
        $notaFrequencias = $this->notaFrequenciaRepository->findByField(['turma_id'=>$id])->all();

        return view('nota_frequencias.index',['notaFrequencias'=> $notaFrequencias,'turma_id'=>$id]);
    }

    /**
     * Show the form for creating a new NotaFrequencia.
     *
     * @return Response
     */
    public function create(
            $id=null, 
            \App\Repositories\TurmasRepository $TurmasRepository,
            \App\Repositories\AlunosRepository $alunosRepository
            )
    {
        $turma = $TurmasRepository->findWhere(['id'=>$id])->pluck('identificador','id');
        $alunos = $alunosRepository->all()->pluck('pessoa.nome','id')->toArray();
        array_unshift($alunos, 'Selecione um Alunos...');
        $situacao = [
            'Pendente'=>'Pendente',
            'Aprovado'=>'Aprovado',
            'Reprovado'=>'Reprovado'
            ];
        return view('nota_frequencias.create',['turma_id'=>$id,'situacao'=>$situacao,'turma'=>$turma,'alunos'=>$alunos]);
    }

    /**
     * Store a newly created NotaFrequencia in storage.
     *
     * @param CreateNotaFrequenciaRequest $request
     *
     * @return Response
     */
    public function store(CreateNotaFrequenciaRequest $request)
    {
        $input = $request->all();

        $notaFrequencia = $this->notaFrequenciaRepository->create($input);

        Flash::success('Nota Frequencia saved successfully.');

        return redirect(url('notaFrequencias/turma',[$notaFrequencia['turma_id']]));
    }

    /**
     * Display the specified NotaFrequencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            Flash::error('Nota Frequencia not found');

            return redirect(route('notaFrequencias.index'));
        }

        return view('nota_frequencias.show')->with('notaFrequencia', $notaFrequencia);
    }

    /**
     * Show the form for editing the specified NotaFrequencia.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(
            $id,
            \App\Repositories\TurmasRepository $TurmasRepository,
            \App\Repositories\AlunosRepository $alunosRepository
            )
    {
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            Flash::error('Nota Frequencia not found');

            return redirect(route('notaFrequencias.index'));
        }
        
        $turma = $TurmasRepository->findWhere(['id'=>$notaFrequencia['turma_id']])->pluck('identificador','id');
        $alunos = $alunosRepository->all()->pluck('pessoa.nome','id')->toArray();
        array_unshift($alunos, 'Selecione um Alunos...');
        $situacao = [
            'Pendente'=>'Pendente',
            'Aprovado'=>'Aprovado',
            'Reprovado'=>'Reprovado'
            ];

        return view('nota_frequencias.edit',['turma_id'=>$id,'situacao'=>$situacao,'turma'=>$turma,'alunos'=>$alunos,'notaFrequencia'=> $notaFrequencia]);
    }

    /**
     * Update the specified NotaFrequencia in storage.
     *
     * @param  int              $id
     * @param UpdateNotaFrequenciaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateNotaFrequenciaRequest $request)
    {
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            Flash::error('Nota Frequencia not found');

            return redirect(route('notaFrequencias.index'));
        }

        $notaFrequencia = $this->notaFrequenciaRepository->update($request->all(), $id);

        Flash::success('Nota Frequencia updated successfully.');

        return redirect(url('notaFrequencias/turma',[$notaFrequencia['turma_id']]));
    }

    /**
     * Remove the specified NotaFrequencia from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $notaFrequencia = $this->notaFrequenciaRepository->findWithoutFail($id);

        if (empty($notaFrequencia)) {
            Flash::error('Nota Frequencia not found');

            return redirect(route('notaFrequencias.index'));
        }

        $this->notaFrequenciaRepository->delete($id);

        Flash::success('Nota Frequencia deleted successfully.');

        return redirect(route('notaFrequencias.index'));
    }
}

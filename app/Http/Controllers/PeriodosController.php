<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePeriodosRequest;
use App\Http\Requests\UpdatePeriodosRequest;
use App\Repositories\PeriodosRepository;
use App\Repositories\EscolasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PeriodosController extends AppBaseController
{
    /** @var  PeriodosRepository */
    private $periodosRepository;
    private $escolasRepository;

    public function __construct(PeriodosRepository $periodosRepo, EscolasRepository $escolasRepo)
    {
        $this->periodosRepository = $periodosRepo;
        $this->escolasRepository = $escolasRepo;
    }

    /**
     * Display a listing of the Periodos.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->periodosRepository->pushCriteria(new RequestCriteria($request));
        $periodos = $this->periodosRepository->all();
        

        return view('periodos.index')
            ->with(['periodos' => $periodos]);
    }

    /**
     * Show the form for creating a new Periodos.
     *
     * @return Response
     */
    public function create()
    {
        $escolas = $this->escolasRepository->pluck('nome','id');
        return view('periodos.create',['escolas'=> $escolas]);
    }

    /**
     * Store a newly created Periodos in storage.
     *
     * @param CreatePeriodosRequest $request
     *
     * @return Response
     */
    public function store(CreatePeriodosRequest $request)
    {
        $input = $request->all();
        //dd($input);
        if($input['tipoperiodo']==1){
            $input['anual'] = true;
            $input['semestre1'] = false;
            $input['semestre2'] = false;
            
        }elseif($input['tipoperiodo']==2){
            $input['anual'] = false;
            $input['semestre1'] = true;
            $input['semestre2'] = false;
            
        }elseif($input['tipoperiodo']==3){
            $input['anual'] = false;
            $input['semestre1'] = false;
            $input['semestre2'] = true;
        }
        $periodos = $this->periodosRepository->create($input);

        Flash::success('Periodo salvo com sucesso!.');

        return redirect(route('periodos.index'));
    }

    /**
     * Display the specified Periodos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $periodos = $this->periodosRepository->with('escola')->find($id);
        
        if (empty($periodos)) {
            Flash::error('Periodos not found');

            return redirect(route('periodos.index'));
        }

        return view('periodos.show')->with('periodos', $periodos);
    }

    /**
     * Show the form for editing the specified Periodos.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $periodos = $this->periodosRepository->find($id);
        //$periodos = $periodos->toArray();
        if (empty($periodos)) {
            Flash::error('Periodos not found');

            return redirect(route('periodos.index'));
        }
        //$periodos['tipoperiodo']=0; 
        //dd($periodos);
        if($periodos->anual == true){
            $tipoperiodo=1;            
        }elseif($periodos->semestre1 == true){
            $tipoperiodo=2;            
        }elseif($periodos->semestre2 == true){
            $tipoperiodo=3; 
        }
//        if($periodos['anual'] == true){
//            $periodos['tipoperiodo']=1;            
//        }elseif($periodos['semestre1'] == true){
//            $periodos['tipoperiodo']=2;            
//        }elseif($periodos['semestre2'] == true){
//            $periodos['tipoperiodo']=3;;
//        }
        //dd($periodos);
        $escolas = $this->escolasRepository->pluck('nome','id');
        return view('periodos.edit')->with(['periodos'=> $periodos, 'escolas'=>$escolas,'tipoperiodo'=>$tipoperiodo]);
    }

    /**
     * Update the specified Periodos in storage.
     *
     * @param  int              $id
     * @param UpdatePeriodosRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePeriodosRequest $request)
    {
        $periodos = $this->periodosRepository->findWithoutFail($id);

        if (empty($periodos)) {
            Flash::error('Periodos not found');

            return redirect(route('periodos.index'));
        }
        $input = $request->all();
        if($input['tipoperiodo']==1){
            $input['anual'] = true;
            $input['semestre1'] = false;
            $input['semestre2'] = false;
            
        }elseif($input['tipoperiodo']==2){
            $input['anual'] = false;
            $input['semestre1'] = true;
            $input['semestre2'] = false;
            
        }elseif($input['tipoperiodo']==3){
            $input['anual'] = false;
            $input['semestre1'] = false;
            $input['semestre2'] = true;
        }
        $periodos = $this->periodosRepository->update($input, $id);

        Flash::success('Periodos updated successfully.');

        return redirect(route('periodos.index'));
    }

    /**
     * Remove the specified Periodos from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $periodos = $this->periodosRepository->findWithoutFail($id);

        if (empty($periodos)) {
            Flash::error('Periodos not found');

            return redirect(route('periodos.index'));
        }

        $this->periodosRepository->delete($id);

        Flash::success('Periodos deleted successfully.');

        return redirect(route('periodos.index'));
    }
}

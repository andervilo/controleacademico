<?php

namespace App\Repositories;

use App\Models\Periodos;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PeriodosRepository
 * @package App\Repositories
 * @version October 27, 2018, 4:33 am UTC
 *
 * @method Periodos findWithoutFail($id, $columns = ['*'])
 * @method Periodos find($id, $columns = ['*'])
 * @method Periodos first($columns = ['*'])
*/
class PeriodosRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'escola_id',
        'ano',
        'anual',
        'semestre1',
        'semestre2'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Periodos::class;
    }
}

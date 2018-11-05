<?php

namespace App\Repositories;

use App\Models\NotaFrequencia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NotaFrequenciaRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:12 pm UTC
 *
 * @method NotaFrequencia findWithoutFail($id, $columns = ['*'])
 * @method NotaFrequencia find($id, $columns = ['*'])
 * @method NotaFrequencia first($columns = ['*'])
*/
class NotaFrequenciaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'aluno_id',
        'frequencia',
        'nota',
        'situacao',
        'turma_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NotaFrequencia::class;
    }
}

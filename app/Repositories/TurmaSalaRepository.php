<?php

namespace App\Repositories;

use App\Models\TurmaSala;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TurmaSalaRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:23 pm UTC
 *
 * @method TurmaSala findWithoutFail($id, $columns = ['*'])
 * @method TurmaSala find($id, $columns = ['*'])
 * @method TurmaSala first($columns = ['*'])
*/
class TurmaSalaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'turma_id',
        'sala_id',
        'dia_semana',
        'hora_inicio',
        'hora_fim'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TurmaSala::class;
    }
}

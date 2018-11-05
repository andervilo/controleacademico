<?php

namespace App\Repositories;

use App\Models\Salas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SalasRepository
 * @package App\Repositories
 * @version November 4, 2018, 10:08 pm UTC
 *
 * @method Salas findWithoutFail($id, $columns = ['*'])
 * @method Salas find($id, $columns = ['*'])
 * @method Salas first($columns = ['*'])
*/
class SalasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'numero',
        'capacidade',
        'setor',
        'andar',
        'corredor'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Salas::class;
    }
}
